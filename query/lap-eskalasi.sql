SELECT
	a.IDEskalasi, a.IDKeluhan, b.Deskripsi, f.NamaProyek,
	c.NamaDivisi, d.NamaPegawai, a.TglEskalasi, a.Keterangan
FROM eskalasi a
	INNER JOIN keluhan b ON a.IDKeluhan = b.IDKeluhan
	INNER JOIN divisi c ON a.IDDivisi = c.IDDivisi
	INNER JOIN pegawai d ON a.IDPegawai = d.IDPegawai
	LEFT JOIN ada e ON a.IDPegawai = e.IDPegawai
	LEFT JOIN proyek f ON e.IDProyek = f.IDProyek
WHERE DATE(a.TglEskalasi) BETWEEN '' AND ''