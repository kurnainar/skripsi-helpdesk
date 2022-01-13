SELECT
	a.IDKeluhan, a.TglKeluhan, a.Deskripsi, c.NamaProyek, b.NamaKlien, d.NamaTM, e.Deskripsi Solusi
FROM keluhan a
	INNER JOIN klien b ON a.IDKlien = b.IDKlien
	INNER JOIN proyek c ON b.IDProyek = c.IDProyek
	INNER JOIN tingkatmasalah d ON a.IDTM = d.IDTM
	INNER JOIN solusi e ON a.IDKeluhan = e.IDKeluhan
WHERE e.TglSolusi BETWEEN '' AND ''