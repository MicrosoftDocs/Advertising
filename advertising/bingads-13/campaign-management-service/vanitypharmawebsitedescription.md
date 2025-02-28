---
title: VanityPharmaWebsiteDescription Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a value set for VanityPharmaWebsiteDescription.
---
# VanityPharmaWebsiteDescription Value Set - Campaign Management
Defines a value set for VanityPharmaWebsiteDescription. This is the text that shows in the display URL of a text ad when *WebsiteDescription* is the selected display mode for vanity pharma URLs for the campaign.  

> [!NOTE]
> *VanityPharmaWebsiteDescription* is reserved for limited pilot usage (e.g., pharmaceutical customers).

## Syntax
```xml
<xs:simpleType name="VanityPharmaWebsiteDescription" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Unspecified" />
    <xs:enumeration value="PrescriptionTreatmentWebsite_En" />
    <xs:enumeration value="PrescriptionTreatmentWebsite_Es" />
    <xs:enumeration value="PrescriptionDeviceWebsite_En" />
    <xs:enumeration value="PrescriptionDeviceWebsite_Es" />
    <xs:enumeration value="MedicalDeviceWebsite_En" />
    <xs:enumeration value="MedicalDeviceWebsite_Es" />
    <xs:enumeration value="PreventativeTreatmentWebsite_En" />
    <xs:enumeration value="PreventativeTreatmentWebsite_Es" />
    <xs:enumeration value="PrescriptionContraceptionWebsite_En" />
    <xs:enumeration value="PrescriptionContraceptionWebsite_Es" />
    <xs:enumeration value="PrescriptionVaccineWebsite_En" />
    <xs:enumeration value="PrescriptionVaccineWebsite_Es" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [VanityPharmaWebsiteDescription](vanitypharmawebsitedescription.md) value set has the following values: [MedicalDeviceWebsite_En](#medicaldevicewebsite_en), [MedicalDeviceWebsite_Es](#medicaldevicewebsite_es), [PrescriptionContraceptionWebsite_En](#prescriptioncontraceptionwebsite_en), [PrescriptionContraceptionWebsite_Es](#prescriptioncontraceptionwebsite_es), [PrescriptionDeviceWebsite_En](#prescriptiondevicewebsite_en), [PrescriptionDeviceWebsite_Es](#prescriptiondevicewebsite_es), [PrescriptionTreatmentWebsite_En](#prescriptiontreatmentwebsite_en), [PrescriptionTreatmentWebsite_Es](#prescriptiontreatmentwebsite_es), [PrescriptionVaccineWebsite_En](#prescriptionvaccinewebsite_en), [PrescriptionVaccineWebsite_Es](#prescriptionvaccinewebsite_es), [PreventativeTreatmentWebsite_En](#preventativetreatmentwebsite_en), [PreventativeTreatmentWebsite_Es](#preventativetreatmentwebsite_es), [Unspecified](#unspecified).

|Value|Description|
|-----------|---------------|
|<a name="medicaldevicewebsite_en"></a>MedicalDeviceWebsite_En|A medical device website with website content in English.|
|<a name="medicaldevicewebsite_es"></a>MedicalDeviceWebsite_Es|A medical device website with website content in Spanish (Sitio de dispositivos medicos).|
|<a name="prescriptioncontraceptionwebsite_en"></a>PrescriptionContraceptionWebsite_En|A prescription contraception website with website content in English.|
|<a name="prescriptioncontraceptionwebsite_es"></a>PrescriptionContraceptionWebsite_Es|A prescription contraception website with website content in Spanish (Sitio de anticonceptivos con receta).|
|<a name="prescriptiondevicewebsite_en"></a>PrescriptionDeviceWebsite_En|A prescription device website with website content in English. (Sitio de dispositivos con receta).|
|<a name="prescriptiondevicewebsite_es"></a>PrescriptionDeviceWebsite_Es|A prescription treatment website with website content in Spanish.|
|<a name="prescriptiontreatmentwebsite_en"></a>PrescriptionTreatmentWebsite_En|A prescription treatment website with website content in English.|
|<a name="prescriptiontreatmentwebsite_es"></a>PrescriptionTreatmentWebsite_Es|A prescription treatment website with website content in Spanish (Sitio de tratamientos con receta).|
|<a name="prescriptionvaccinewebsite_en"></a>PrescriptionVaccineWebsite_En|A prescription vaccine website with website content in English.|
|<a name="prescriptionvaccinewebsite_es"></a>PrescriptionVaccineWebsite_Es|A prescription vaccine website with website content in Spanish (Sitio de vacunas con receta).|
|<a name="preventativetreatmentwebsite_en"></a>PreventativeTreatmentWebsite_En|A preventative treatment website with website content in English. |
|<a name="preventativetreatmentwebsite_es"></a>PreventativeTreatmentWebsite_Es|A preventative treatment website with website content in Spanish (Sitio de tratamientos preventivos).|
|<a name="unspecified"></a>Unspecified|The website description is not specified.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[VanityPharmaSetting](vanitypharmasetting.md)  
