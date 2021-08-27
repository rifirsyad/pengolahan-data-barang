# Aplikasi Pengolahan Data Barang

Buatlah sebuah aplikasi pengolahan data barang berdasarkan tabel berikut ini:

Tabel kategori

| Name | Type |
| - | - |
| idKategori | Int (3) AI PK |
| namaKategori | Varchar (50)  |

Tabel merek

| Name | Type |
| - | - |
| idMerek | Int (3) AI PK |
| namaMerek | Varchar (50)  |

Tabel produk

| Name | Type |
| - | - |
| idProduk | Int(5) AI PK |
| idKategori | Int (3) berelasi dengan idKategori di tabel kategori |
| idMerek | Int (3) berelasi dengan idMerek di tabel merek |
| namaProduk | Varchar (100) |
| Harga | int (8) |
| Stok | Int (5) |
| Foto | Varchar (200) |
| Deskripsi | Text |
| Status | Enum ("Baru", "Bekas") |

Tabel admin

| Name | Type |
| - | - |
| idAdmin | Int (3) AI PK |
| Username | Varchar (100) |
| Password | Varchar (100) |
| Level | Enum ("Admin", "Operator") |

Dengan ketentuan:

1. Aplikasi dibangun menggunakan framework codeigniter 3
2. Wajib menggunakan template https://github.com/gurayyarar/AdminBSBMaterialDesign
3. Terdapat dua level pengguna yaitu admin dan operator dengan pembagian hak akses sebagai berikut:
   - Admin = dapat mengelola semua data (kategori, merek dan produk)
   - Operator = hanya dapat mengolah data produk
4. Sebelum masuk ke sistem wajib login terlebih dahulu
5. Pengolahan data yang dimaksud adalah CRUD, bisa melihat, menambah, mengedit dan menghapus, baik itu data kategori, merek ataupun produk
6. Untuk semua proses memasukkan dan mengedit data harus divalidasi terlebih dahulu, validasi dari sisi codeigniter bukan HTML
7. Untuk form input atau edit pada produk, idkategori dan idmerek berbentuk select, deskripsi berbentuk textarea, status berbentuk radio button, foto berbentuk file dan dapat upload file gambar, selain yang disebutkan berbentuk text
