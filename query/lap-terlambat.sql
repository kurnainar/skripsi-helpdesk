SELECT
	a.IDKeluhan, a.TglKeluhan, a.Deskripsi, 
	b.NamaTM, b.Lama, c.TglSolusi,
	(c.TglSolusi) - (date(a.TglKeluhan)) as Hasil,
	IF( (c.TglSolusi) - (date(a.TglKeluhan)) > b.Lama, 1, 0 ) keterangan
FROM keluhan a
	INNER JOIN tingkatmasalah b ON a.IDTM = b.IDTM
	INNER JOIN solusi c ON a.IDKeluhan = c.IDKeluhan
GROUP BY a.IDKeluhan
HAVING keterangan = 1