<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css" />
    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <title>Daftar Nilai Mahasiswa</title>
</head>

<body>


    <!-- Bagian Penyimpanan variable didalam array -->
    <?php

    $data_mahasiswa = [
        ['nama' => 'Umarpan', 'nim' => 21210011, 'nilai' => 100],
        ['nama' => 'laura', 'nim' => 21210022, 'nilai' => 89],
        ['nama' => 'M. anisa', 'nim' => 21210033, 'nilai' => 88],
        ['nama' => 'aluni pangoro', 'nim' => 21210044, 'nilai' => 87],
        ['nama' => 'siti kamila', 'nim' => 21210055, 'nilai' => 100],
        ['nama' => 'mila kandi', 'nim' => 21211100, 'nilai' => 65],
        ['nama' => 'Multim partiwi', 'nim' => 21211200, 'nilai' => 55],
        ['nama' => 'septi hariansa', 'nim' => 21210034, 'nilai' => 64],
        ['nama' => 'gusdur asep partiwi', 'nim' => 21210035, 'nilai' =>74],
        ['nama' => 'ahmad putra', 'nim' => 1101211096, 'nilai' => 75],
        ['nama' => 'yanti', 'nim' => 21210053, 'nilai' => 75],
        ['nama' => 'budi siregar', 'nim' => 21210053, 'nilai' => 75],
        ['nama' => 'mega syaputra', 'nim' => 21210054, 'nilai' => 85],
        ['nama' => 'andiago', 'nim' => 21210056, 'nilai' => 60],
        ['nama' => 'irwan gea', 'nim' => 21215241, 'nilai' => 60],
        ['nama' => 'paul dermansah', 'nim' => 21216433, 'nilai' => 82],
        ['nama' => 'asep marbun', 'nim' => 21219905, 'nilai' => 75],
        ['nama' => 'giat berlin', 'nim' => 212106404, 'nilai' => 87],
        ['nama' => 'afni dewi', 'nim' => 21210585, 'nilai' => 85],
        ['nama' => 'bagas rindo', 'nim' => 21210909, 'nilai' => 75]
    ];
    $arr_judul = ['No', 'Nama Mahasiswa', 'NIM', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];

    ?>

    <!-- Akhir Bagian Penyimpanan variable didalam array -->

    <!-- Bagian Table -->
    <div class="container w-100 mt-3">
        <h3 class="text-center">Daftar Nilai Mahasiswa</h3>
        <table id="example" class="table table-striped table-sm table-bordered" style="width:100%">
            <thead>
                <tr>
                    <?php
                    foreach ($arr_judul as $judul) { ?>
                        <th><?= $judul ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_mahasiswa as $list_mahasiswa) {

                    $keterangan = ($list_mahasiswa['nilai'] >= 65) ? 'Lulus' : 'Tidak lulus';
                    if ($list_mahasiswa['nilai'] > 90 && $list_mahasiswa['nilai'] <= 100) {
                        $grade = 'A';
                    } else if ($list_mahasiswa['nilai'] > 80 && $list_mahasiswa['nilai'] <= 90) {
                        $grade = 'B';
                    } else if ($list_mahasiswa['nilai'] > 70 && $list_mahasiswa['nilai'] <= 80) {
                        $grade = 'C';
                    } else if ($list_mahasiswa['nilai'] > 60 && $list_mahasiswa['nilai'] <= 70) {
                        $grade = 'D';
                    } else if ($list_mahasiswa['nilai'] > 50 && $list_mahasiswa['nilai'] <= 60) {
                        $grade = 'E';
                    } else {
                        $grade = 'E';
                    }
                    switch ($grade) {
                        case 'A':
                            $predikat = 'Memuaskan';
                            break;
                        case 'B':
                            $predikat = 'Bagus';
                            break;
                        case 'C':
                            $predikat = 'Cukup';
                            break;
                        case 'D':
                            $predikat = 'Kurang';
                            break;
                        case 'E':
                            $predikat = 'Buruk';
                            break;
                        default:
                            echo "Mungkin Anda Salah Jurusan";
                    }
                ?>
      
                    }
                </style>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $list_mahasiswa['nama'] ?></td>
                        <td><?= $list_mahasiswa['nim'] ?></td>
                        <td><?= $list_mahasiswa['nilai'] ?></td>
                        <td><?= $keterangan ?></td>
                        <td><?= $grade ?></td>
                        <td><?= $predikat ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <?php
                $jumlah_nilai = array_column($data_mahasiswa, 'nilai');
                $jumlah_mahasiswa = array_column($data_mahasiswa, 'nama');

                $nilai_tertinggi  = max($jumlah_nilai);
                $nilai_terendah = min($jumlah_nilai);
                $nilai_rata_rata = array_sum($jumlah_nilai) / count($jumlah_nilai);
                $jumlah_Mahasiswa = count($jumlah_mahasiswa);
                $jumlah_keseluruhan_nilai = array_sum($jumlah_nilai);

                $Keterangan = [
                    'Nilai Tertinggi' => $nilai_tertinggi,
                    'Nilai Terendah' => $nilai_terendah,
                    'Nilai Rata-Rata' => $nilai_rata_rata,
                    'Jumlah Mahasiswa' => $jumlah_Mahasiswa,
                    'Jumlah Keseluruhan Nilai' => $jumlah_keseluruhan_nilai
                ];

                ?>

                <?php
                foreach ($Keterangan as $ket => $value) { ?>
                    <tr>
                        <th colspan="3"><?= $ket ?></th>
                        <th colspan="4"><?= $value ?></th>
                    </tr>
                <?php } ?>

            </tfoot>
        </table>
    </div>
    <!-- Akhir Bagian Table -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#example', {
            scrollX: true
        });
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 100%;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tfoot th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</body>

</html>