<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class citySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $GuatemalaStatesCities = [
            1 => ["Chahal","Chisec","Cobán","Fray Bartolomé de las Casas","La Tinta","Lanquín","Panzós","Raxruhá","San Cristóbal Verapaz","San Juan Chamelco","San Pedro Carchá","Santa Cruz Verapaz","Santa María Cahabón","Senahú","Tactic","Tamahú","Tucurú"],
            2 => ["Cubulco","Santa Cruz el Chol","Granados","Purulhá","Rabinal","Salamá","San Miguel Chicaj","San Jerónimo"],
            3 => ["Chimaltenango","San José Poaquíl","San Martín Jilotepeque","San Juan Comalapa","Santa Apolonia","Tecpán","Patzún","Pochuta","Patzicía","Santa Cruz Balanyá","Acatenango","San Pedro Yepocapa","San Andrés Itzapa","Parramos","Zaragoza","El Tejar"],
            4 => ["Camotán","Chiquimula","Concepción Las Minas","Esquipulas","Ipala","San Juan Ermita","Jocotán","Olopa","Quetzaltepeque","San Jacinto","San José la Arada"],
            5 => ["Santa Catarina Pinula","San José Pinula","Guatemala","San José del Golfo","Palencia","Chinautla","San Pedro Ayampuc","Mixco","San Pedro Sacatapéquez","San Juan Sacatepéquez","Chuarrancho","San Raymundo","Fraijanes","Amatitlán","Villa Nueva","Villa Canales","San Miguel Petapa"],
            6 => ["El Jícaro","Morazán","San Agustín Acasaguastlán","San Antonio La Paz","San Cristóbal Acasaguastlán","Sanarate","Guastatoya","Sansare"],
            7 => ["Escuintla","Santa Lucía Cotzumalguapa","La Democracia","Siquinalá","Masagua","Tiquisate","La Gomera","Guaganazapa","San José","Iztapa","Palín","San Vicente Pacaya","Nueva Concepción"],
            8 => ["Huehuetenango","Chiantla","Malacatancito","Cuilco","Nentón","San Pedro Necta","Jacaltenango","Soloma","Ixtahuacán","Santa Bárbara","La Libertad","La Democracia","San Miguel Acatán","San Rafael La Independencia","Todos Santos Cuchumatán","San Juan Atitlán","Santa Eulalia","San Mateo Ixtatán","Colotenango","San Sebastián Huehuetenango","Tectitán","Concepción Huista","San Juan Ixcoy","San Antonio Huista","Santa Cruz Barillas","San Sebastián Coatán","Aguacatán","San Rafael Petzal","San Gaspar Ixchil","Santiago Chimaltenango","Santa Ana Huista"],
            9 => ["Morales","Los Amates","Livingston","El Estor","Puerto Barrios"],
            10 => ["Jalapa","San Pedro Pinula","San Luis Jilotepeque","San Manuel Chaparrón","San Carlos Alzatate","Monjas","Mataquescuintla"],
            11 => ["Jutiapa","El Progreso","Santa Catarina Mita","Agua Blanca","Asunción Mita","Yupiltepeque","Atescatempa","Jerez","El Adelanto","Zapotitlán","Comapa","Jalpatagua","Conguaco","Moyuta","Pasaco","Quesada"],
            12 => ["Flores","San José","San Benito","San Andrés","La Libertad","San Francisco","Santa Ana","Dolores","San Luis","Sayaxché","Melchor de Mencos","Poptún"],
            13 => ["Quetzaltenango","Salcajá","San Juan Olintepeque","San Carlos Sija","Sibilia","Cabricán","Cajolá","San Miguel Siguilá","San Juan Ostuncalco","San Mateo","Concepción Chiquirichapa","San Martín Sacatepéquez","Almolonga","Cantel","Huitán","Zunil","Colomba Costa Cuca","San Francisco La Unión","El Palmar","Coatepeque","Génova","Flores Costa Cuca","La Esperanza","Palestina de Los Altos"],
            14 => ["Santa Cruz del Quiché","Chiché","Chinique","Zacualpa","Chajul","Santo Tomás Chichicastenango","Patzité","San Antonio Ilotenango","San Pedro Jocopilas","Cunén","San Juan Cotzal","Santa María Joyabaj","Santa María Nebaj","San Andrés Sajcabajá","Uspantán","Sacapulas","San Bartolomé Jocotenango","Canillá","Chicamán","Ixcán","Pachalum"],
            15 => ["Retalhuleu","San Sebastián","Santa Cruz Muluá","San Martín Zapotitlán","San Felipe","San Andrés Villa Seca","Champerico","Nuevo San Carlos","El Asintal"],
            16 => ["Antigua Guatemala","Jocotenango","Pastores","Sumpango","Santo Domingo Xenacoj","Santiago Sacatepéquez","San Bartolomé Milpas Altas","San Lucas Sacatepéquez","Santa Lucía Milpas Altas","Magdalena Milpas Altas","Santa María de Jesús","Ciudad Vieja","San Miguel Dueñas","San Juan Alotenango","San Antonio Aguas Calientes","Santa Catarina Barahona"],
            17 => ["San Marcos","Ayutla","Catarina","Comitancillo","Concepción Tutuapa","El Quetzal","El Rodeo","El Tumblador","Ixchiguán","La Reforma","Malacatán","Nuevo Progreso","Ocós","Pajapita","Esquipulas Palo Gordo","San Antonio Sacatepéquez","San Cristóbal Cucho","San José Ojetenam","San Lorenzo","San Miguel Ixtahuacán","San Pablo","San Pedro Sacatepéquez","San Rafael Pie de la Cuesta","Sibinal","Sipacapa","Tacaná","Tajumulco","Tejutla","Río Blanco","La Blanca"],
            18 => ["Cuilapa","Casillas Santa Rosa","Chiquimulilla","Guazacapán","Nueva Santa Rosa","Oratorio","Pueblo Nuevo Viñas","San Juan Tecuaco","San Rafael Las Flores","Santa Cruz Naranjo","Santa María Ixhuatán","Santa Rosa de Lima","Taxisco","Barberena"],
            19 => ["Sololá","Concepción","Nahualá","Panajachel","San Andrés Semetabaj","San Antonio Palopó","San José Chacayá","San Juan La Laguna","San Lucas Tolimán","San Marcos La Laguna","San Pablo La Laguna","San Pedro La Laguna","Santa Catarina Ixtahuacán","Santa Catarina Palopó","Santa Clara La Laguna","Santa Cruz La Laguna","Santa Lucía Utatlán","Santa María Visitación","Santiago Atitlán"],
            20 => ["Mazatenango","Cuyotenango","San Francisco Zapotitlán","San Bernardino","San José El Ídolo","Santo Domingo Suchitépequez","San Lorenzo","Samayac","San Pablo Jocopilas","San Antonio Suchitépequez","San Miguel Panán","San Gabriel","Chicacao","Patulul","Santa Bárbara","San Juan Bautista","Santo Tomás La Unión","Zunilito","Pueblo Nuevo","Río Bravo"],
            21 => ["Totonicapán","San Cristóbal Totonicapán","San Francisco El Alto","San Andrés Xecul","Momostenango","Santa María Chiquimula","Santa Lucía La Reforma","San Bartolo"],
            22 => ["Cabañas","Estanzuela","Gualán","Huité","La Unión","Río Hondo","San Jorge","San Diego","Teculután","Usumatlán","Zacapa"]
        ];

        foreach ($GuatemalaStatesCities as $s => $state) {
            foreach ($state as $c => $city ) {
                DB::table('city')->insert([
                    'stateId' => $s,
                    'city' => $city,
                    'active' => 'Y',
                    'created_at' => now(),
                    'updated_at' => now()
               ]);    
            }
        }
        
    }
}
