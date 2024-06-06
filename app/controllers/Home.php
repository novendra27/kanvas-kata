<?php

class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'Home';
        $data['artikel'] = $this->model('Artikel_model')->getAllArtikel();
        $data = $this->formatTanggal($data);
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function detailArtikel($id_artikel)
    {
        $data['judul'] = 'Detail Artikel';
        $data['id'] = $id_artikel;
        $data['artikel'] = $this->model('Artikel_model')->getArtikelById($data['id']);
        $data = $this->formatTanggalById($data);
        $data['kategori'] = $this->model('Kategori_model')->getKategoriById($data['artikel']['id_kategori']);
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('home/detail_artikel', $data);
        $this->view('templates/footer');
    }

    public function formatTanggal($data)
    {
        // Misalkan kolom datetime di tabel Anda bernama 'tanggal'
        foreach ($data['artikel'] as &$artikel) {
            $datetime = $artikel['tanggal'];

            // Array untuk terjemahan hari dan bulan
            $hari_indonesia = [
                'Sunday' => 'Minggu',
                'Monday' => 'Senin',
                'Tuesday' => 'Selasa',
                'Wednesday' => 'Rabu',
                'Thursday' => 'Kamis',
                'Friday' => 'Jumat',
                'Saturday' => 'Sabtu'
            ];

            $bulan_indonesia = [
                'January' => 'Januari',
                'February' => 'Februari',
                'March' => 'Maret',
                'April' => 'April',
                'May' => 'Mei',
                'June' => 'Juni',
                'July' => 'Juli',
                'August' => 'Agustus',
                'September' => 'September',
                'October' => 'Oktober',
                'November' => 'November',
                'December' => 'Desember'
            ];

            // Format datetime ke format yang diinginkan
            $formatted_datetime = date('H:i:s, l, d F Y', strtotime($datetime));

            // Pisahkan bagian-bagian dari datetime
            $datetime_parts = explode(', ', $formatted_datetime);

            // Terjemahkan hari dan bulan
            $time = $datetime_parts[0];
            $day = $hari_indonesia[$datetime_parts[1]];
            list($date, $month, $year) = explode(' ', $datetime_parts[2]);
            $month = $bulan_indonesia[$month];

            // Format akhir dalam bahasa Indonesia
            $formatted_date = "$time WIB, $day $date $month $year";
            $artikel['tanggal'] = $formatted_date;
        }
        return $data;
    }

    public function formatTanggalById($data)
    {
        // Misalkan kolom datetime di tabel Anda bernama 'tanggal'
        $datetime = $data['artikel']['tanggal'];

        // Array untuk terjemahan hari dan bulan
        $hari_indonesia = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];

        $bulan_indonesia = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        ];

        // Format datetime ke format yang diinginkan
        $formatted_datetime = date('H:i:s, l, d F Y', strtotime($datetime));

        // Pisahkan bagian-bagian dari datetime
        $datetime_parts = explode(', ', $formatted_datetime);

        // Terjemahkan hari dan bulan
        $time = $datetime_parts[0];
        $day = $hari_indonesia[$datetime_parts[1]];
        list($date, $month, $year) = explode(' ', $datetime_parts[2]);
        $month = $bulan_indonesia[$month];

        // Format akhir dalam bahasa Indonesia
        $formatted_date = "$time WIB, $day $date $month $year";
        $data['artikelById']['tanggal'] = $formatted_date;
        return $data;
    }
}
