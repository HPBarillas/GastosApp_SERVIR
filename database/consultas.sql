
SELECT p.project, p.`description`, SUM(psd.totalService) total, SUM(psd.totalDonation) donation, ((SUM(psd.totalDonation) * 100)/SUM(psd.totalService)) procentaje
FROM projects p
	JOIN projects_services_donations psd ON p.id = psd.projectId
GROUP BY p.project, p.`description`;


SELECT p.project, s.service, s.`description`, psd.totalService, psd.totalDonation, (psd.totalService - psd.totalDonation) pendiente 
FROM projects_services_donations psd
	JOIN projects p ON psd.projectId = p.id
	JOIN services s ON psd.serviceId = s.id
ORDER BY 1,2