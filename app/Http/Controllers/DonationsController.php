<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use DB;
use App\Models\ProjectsServicesDonations;
use App\Models\PurchaseHeader;
use App\Models\PurchaseDetail;
use App\Models\Organization;
use App\Models\Countries;
use App\Models\Donations;
use App\Models\Projects;
use App\Models\Services;
use App\Models\State;
use App\Models\City;

class DonationsController extends Controller
{
    public function getOrganizations() {
        return Organization::where([['active', '=', 'Y']])->get();
    }

    public function getCountries() {
        return Countries::where([['active', '=', 'Y']])->get();
    }
    
    public function getStates() {
        return State::where([['active', '=', 'Y']])->get();
    }
    
    public function getCities() {
        return City::where([['active', '=', 'Y']])->get();
    }
    
    public function getAllServices() {
        return Services::where([['active', '=', 'Y']])->get();
    }
    
    public function getAllProjects() {
        return Projects::where([['active', '=', 'Y']])->get();
    }
    
    public function getProjects(){
        $projects = DB::table('projects')
            ->join('organizations', 'projects.organizationId', '=', 'organizations.id')
            ->join('countries', 'projects.countryId', '=', 'countries.id')
            ->select('projects.id', 'organizations.name','projects.project','projects.description','countries.country','projects.startDate','projects.endDate')
                ->where('projects.active', '=', 'Y')
            ->orderBy('projects.id', 'ASC')->get();

        return view('pages.projects.projects-management', ['projects' => $projects, 'organizations' => $this->getOrganizations(), 'countries' => $this->getCountries(), 'states' => $this->getStates(), 'cities' => $this->getCities()]);
    }

    public function getProject($id){
        $project = Projects::where([['id', '=', $id]])->get();
        
        $projectServices = DB::table('projects_services_donations')
        ->join('services', 'projects_services_donations.serviceId', '=', 'services.id')
        ->select('projects_services_donations.id', 'projects_services_donations.serviceId', 'services.service', 'services.description', 'projects_services_donations.totalService', 'projects_services_donations.totalDonation', 'projects_services_donations.isCompleted','projects_services_donations.active')
        ->where('projects_services_donations.projectId', '=', $id)
            ->orderBy('projects_services_donations.id', 'ASC')->get();

        return view('pages.projects.projects-describe', ['project' => $project, 'projectServices' => $projectServices, 'organizations' => $this->getOrganizations(), 'countries' => $this->getCountries(), 'states' => $this->getStates(), 'cities' => $this->getCities(), 'services' => $this->getAllServices()]);
    }

    public function getServices(){
        $services = Services::get();
        return view('pages.services.services-management', ['services' => $services]);
    }
    
    public function getDonations() {
        $donations = Donations::get();

        $projectsServices = DB::table('projects_services_donations')
        ->join('projects', 'projects_services_donations.projectId', '=', 'projects.id')
        ->join('services', 'projects_services_donations.serviceId', '=', 'services.id')
        ->select('projects_services_donations.id', 'projects_services_donations.projectId', 'projects.project', 'projects_services_donations.serviceId', 'services.service', 'projects_services_donations.totalService','projects_services_donations.isCompleted','projects_services_donations.active')
        ->where('projects_services_donations.isCompleted', '=', 'N')
            ->orderBy('projects_services_donations.id', 'ASC')->get();

        return view('pages.donations.donations-management', ['donations' => $donations, 'projectsServices' => $projectsServices]);
    }

    public function getPurchases(){
        $purchases = DB::table('purchase_headers')
        ->join('projects', 'purchase_headers.projectId', '=', 'projects.id')
        ->select('purchase_headers.id', 'purchase_headers.description', 'purchase_headers.projectId', 'purchase_headers.proveedor', 'projects.project', 'purchase_headers.status', 'purchase_headers.dueDate', 'purchase_headers.created_at')
            ->orderBy('purchase_headers.proveedor', 'ASC')->get();

        return view('pages.purchase.purchase-management', ['purchases' => $purchases, 'projects' => $this->getAllProjects()]);
    }
    
    public function getPurchase($id){
        // $project = PurchaseHeader::where([['id', '=', $id]])->get();
        
        $purchases_details = DB::table('purchase_details')
        ->join('purchase_headers', 'purchase_details.headerId', '=', 'purchase_headers.id')
        ->join('projects_services_donations', 'purchase_details.projectServiceDonationId', '=', 'projects_services_donations.id')
        ->select('*')
        ->where('purchase_details.headerId', '=', $id)
            ->orderBy('purchase_details.id', 'ASC')->get();

        return view('pages.purchase.purchase-describe', ['purchases_details' => $purchases_details, 'services' => $this->getAllServices() ]);
    }
    
    public function newProject(Request $request){
        $attributes = request()->validate([
            'organizationId' => ['required'],
            'name' => ['required','max:150','unique:projects,project'],
            'description' => ['required','max:350'],
            'startDate' => ['required'],
            'endDate' => ['required'],
            'countryId' => ['required'],
            'stateId' => ['required'],
            'cityId' => ['required'],
            'active' => ['required'],
        ]);

        $project = new Projects;
        $project->organizationId = $attributes['organizationId'];
        $project->project = $attributes['name'];
        $project->description = $attributes['description'];
        $project->startDate = $attributes['startDate'];
        $project->endDate = $attributes['endDate'];
        $project->countryId = $attributes['countryId'];
        $project->stateId = $attributes['stateId'];
        $project->cityId = $attributes['cityId'];
        $project->active = $attributes['active'];
        
        if ($project->save()) {
            return redirect()->to('pages.projects.projects-management')->with('status','El proyecto se creo correctamente');
        } else {
            return redirect()->to('pages.projects.projects-management')->with('error','El proyecto no se creo, favor de revisar');
        }
    }

    public function newService(Request $request){
        $attributes = request()->validate([
            'name' => ['required','max:150','unique:services,service'],
            'description' => ['required','max:350'],
            'active' => ['required'],
        ]);

        $service = new Services;
        $service->service = $attributes['name'];
        $service->description = $attributes['description'];
        $service->active = $attributes['active'];
        
        if ($service->save()) {
            return redirect()->to('services-management')->with('status','El rublo se creo correctamente');
        } else {
            return redirect()->to('services-management')->with('error','El rublo no se creo, favor de revisar');
        }
    }

    public function newDonation(Request $request){
        $attributes = request()->validate([
            'donor' => ['required','max:150','unique:services,service'],
            'description' => ['required','max:350'],
            'amount' => ['required'],
            'donationType' => ['required'],
            'active' => ['required'],
        ]);

        $donation = new Donations;
        $donation->donor = $attributes['donor'];
        $donation->description = $attributes['description'];
        $donation->isOrganization = $attributes['donationType'];
        $donation->donationAmount = $attributes['amount'];
        $donation->active = $attributes['active'];
        
        if ($donation->save()) {
            return redirect()->to('donations-management')->with('status','La donacion se creo correctamente');
        } else {
            return redirect()->to('donations-management')->with('error','La donacion no se creo, favor de revisar');
        }
    }

    public function newProjectService(Request $request){
        $attributes = request()->validate([
            'projectId' => ['required','max:350'],
            'serviceId' => ['required'],
            'amount' => ['required'],
            'isCompleted' => ['required'],
        ]);

        $serviceProject = new ProjectsServicesDonations;
        $serviceProject->projectId = $attributes['projectId'];
        $serviceProject->serviceId = $attributes['serviceId'];
        $serviceProject->totalService = $attributes['amount'];
        $serviceProject->isCompleted = $attributes['isCompleted'];
        $serviceProject->active = 'Y';
        
        if ($serviceProject->save()) {
            return redirect()->to('project-describe/'.$attributes['projectId'])->with('status','Se agrego el rublo correctamente al proyecto');
        } else {
            return redirect()->to('project-describe/'.$attributes['projectId'])->with('error','El rublo no se agrego correctamente al proyecto, favor de revisar');
        }
    }

    public function updateProject(Request $request){
        $attributes = request()->validate([
            'projectOrganization' => ['required'],
            'projectName' => ['required', 'max:150'],
            'projectDescription' => ['required', 'max:350'],
            'projectStartDate' => ['required'],
            'projectEndDate' => ['required'],
            'projectCountry' => ['required'],
            'projectState' => ['required'],
            'projectCity' => ['required'],
            'projectActive' => ['required'],
        ]);
        
        Projects::where('id',$request->get('projectId'))
        ->update([
            'organizationId' => $attributes['projectOrganization'],
            'project' => $attributes['projectName'],
            'description' => $attributes['projectDescription'],
            'startDate' => $attributes['projectStartDate'],
            'endDate' => $attributes['projectEndDate'],
            'countryId' => $attributes['projectCountry'],
            'stateId' => $attributes['projectState'],
            'cityId' => $attributes['projectCity'],
            'active' =>  $attributes["projectActive"],
            'updated_at' => now(),
        ]);

        return redirect()->to("project-describe/" . $request->get('projectId'))->with('success', 'Se ha modificado el proyecto exitosamente.');
    }

    public function updateService(Request $request){
        $attributes = request()->validate([
            'service-update' => ['required', 'max:150'],
            'description-update' => ['required', 'max:350'],
            'active-update' => ['required'],
        ]);
        
        Services::where('id',$request->get('serviceId'))
        ->update([
            'service' => $attributes['service-update'],
            'description' => $attributes['description-update'],
            'active' => $attributes['active-update'],
            'updated_at' => now(),
        ]);

        return redirect()->to("services-management")->with('success', 'Se ha modificado el servicio exitosamente.');
    }

    public function updateDonation(Request $request){
        $attributes = request()->validate([
            'donor-update' => ['required', 'max:150'],
            'amount-update' => ['required'],
            'donationType-update' => ['required'],
            'description-update' => ['required', 'max:350'],
            'active-update' => ['required'],
        ]);
        
        Donations::where('id',$request->get('donationId'))
        ->update([
            'donor' => $attributes['donor-update'],
            'description' => $attributes['description-update'],
            'isOrganization' => $attributes['donationType-update'],
            'donationAmount' => $attributes['amount-update'],
            'active' => $attributes['active-update'],
            'updated_at' => now(),
        ]);

        return redirect()->to("donations-management")->with('status', 'Se ha modificado la donacion exitosamente.');
    }

    public function makeDonation(Request $request){
        $donationValue = $request->get('amount-make');
        $valueDonated = $request->get('amountToDonate-make');
        $newAmount = $donationValue - $valueDonated;

        if ($newAmount > 0) {
            Donations::where('id',$request->get('donationId-make'))
            ->update([
                'donationAmount' => $newAmount,
                'updated_at' => now(),
            ]);
        }else{
            Donations::where('id',$request->get('donationId-make'))
            ->update([
                'donationAmount' => $newAmount,
                'active' => 'N',
                'updated_at' => now(),
            ]);
        }
        
        ProjectsServicesDonations::where('id',$request->get('projectService-make'))
        ->update([
            'donationId' =>$request->get('donationId-make'),
            'totalDonation' => $request->get('amountToDonate-make'),
            'updated_at' => now(),
        ]);

        return redirect()->to("donations-management")->with('status', 'Se ha realizado la donacion exitosamente, muchas gracias.');
    }

    public function updateProjectService(Request $request){
        $attributes = request()->validate([
            'service-update' => ['required'],
            'amount-update' => ['required', 'max:150'],
            'isCompleted-update' => ['required'],
        ]);
        
        ProjectsServicesDonations::where('id',$request->get('projectServiceId-update'))
        ->update([
            'serviceId' => $attributes['service-update'],
            'totalService' => $attributes['amount-update'],
            'isCompleted' => $attributes['isCompleted-update'],
            'active' => 'Y',
            'updated_at' => now(),
        ]);

        return redirect()->to("project-describe/".$request->get('projectId-update'))->with('status', 'Se ha modificado el rublo exitosamente.');
    }

}
