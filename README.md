## Janji
Saya Mohammad Mudrik dengan NIM 2407142 berjanji untuk mengerjakan tugas praktikum 6 dengan sungguh-sungguh Dalam mata kuliah Dasar Pemrograman Berorientasi Objek tanpa membocorkan atau mencotek kepada teman Demi Kebaikan-Nya

---

## 🎮 Tema Website
Website ini bertema **manajemen garasi MotoGP**, di mana:
- **Team** mewakili tim MotoGP.
- **Rider** adalah pembalap yang membalap untuk tim tertentu.
- **Bike** adalah motor yang digunakan oleh rider.

Aplikasi ini digunakan untuk **mencatat, melihat, memperbarui, dan menghapus** data tersebut.

---

## 🗄️ Desain Tabel

### Tabel 1: `team`
| Kolom      | Tipe        | Keterangan              |
|------------|-------------|------------------------|
| id         | INT PK AI   | Primary key            |
| name       | VARCHAR     | Nama team              |
| country    | VARCHAR     | Negara asal team       |

### Tabel 2: `rider`
| Kolom      | Tipe        | Keterangan                         |
|------------|-------------|------------------------------------|
| id         | INT PK AI   | Primary key                         |
| name       | VARCHAR     | Nama pembalap                      |
| nationality| VARCHAR     | Kebangsaan                         |
| number     | INT         | Nomor balap                        |
| team_id    | INT FK      | Relasi ke `team(id)`               |

**Relasi:**  
Satu **team** dapat memiliki banyak **rider** (One-to-Many).

### Tabel 3: `bike`
| Kolom      | Tipe        | Keterangan                                      |
|------------|-------------|------------------------------------------------|
| id         | INT PK AI   | Primary key                                     |
| rider_id   | INT FK      | Relasi ke `rider(id)`                           |
| model      | VARCHAR     | Model motor                                     |
| engine_cc  | INT         | Kapasitas mesin                                 |
| chassis    | VARCHAR     | Jenis rangka motor                              |
| year       | INT         | Tahun produksi motor                            |

**Relasi:**  
Satu **rider** memiliki satu motor utama **(One-to-One / One-to-Many)**.

---
## Dokumentasi


https://github.com/user-attachments/assets/a079a661-4733-4b80-9f52-795f8c654dc2




https://github.com/user-attachments/assets/6b0850a1-0f9d-4285-878f-3233136c0a52




https://github.com/user-attachments/assets/b4921c9d-695f-4d43-866a-7638caeabf7a

