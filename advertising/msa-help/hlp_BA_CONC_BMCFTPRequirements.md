---
title: What are the FTP/SFTP server requirements?
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: You can use FTP/SFTP for file upload when your catalog feed file is over 4MB, but under 1GB. If your feed file is larger than 1GB, split it into multiple files and create corresponding catalogs.
---

# What are the FTP/SFTP server requirements?

You can use FTP/SFTP for file upload when your catalog feed file is over 4MB, but under 1GB. If your feed file is larger than 1GB, split it into multiple files and create corresponding catalogs. If uploading via FTP/SFTP, the file name of TSV, TXT, or XML files have to match the file name specified for a catalog’s settings. In the case of compressed text format, the compressed .txt file inside the archive (ZIP), GZ, GZIP, TAR.GZ, TGZ) must have the matching file name.

The recommended FTP/SFTP upload mechanism is via an FTP/SFTP program. It is however possible to do so via the command line or custom scripts (such as Python’s ftplib.FTP module). The FileZilla FTP/SFTP client is recommended for all platforms.

To find the FTP/SFTP information, such as the server name, port, and fingerprint:

1. From the navigation menu on the left, select **Tools** > **Merchant Center** > **Settings**.
1. Select the **FTP/SFTP** tab.

Use the following settings for file transfer with your FTP/SFTP client:

- Host: ftps://feeds.adcenter.microsoft.com
- Username: Your store’s FTP/SFTP user name. Your user name must be 6 - 64 characters and cannot include any special characters. Use only a - z, A- Z, and 0 - 9.
- Password: Your store’s FTP/SFTP password
- Transfer Mode: Passive
