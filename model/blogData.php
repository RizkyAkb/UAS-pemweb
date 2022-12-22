<?php
// FUNGSI
function tanggal_indo($tanggal, $cetak_hari = false)
{
    $hari = array(
        1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
    );

    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split       = explode('-', $tanggal);
    $tgl_indo = $split[0] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[2];

    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
    }
    return $tgl_indo;
}

function lama_baca_teks($teks)
{
    $jumlah_kata = str_word_count($teks);
    $kata_per_menit = 135;
    $lama_baca = $jumlah_kata / $kata_per_menit;
    $lama_baca = ceil($lama_baca);
    echo $lama_baca . " minute read";
}

?>
<?php
include '../controller/koneksi.php';
$record_per_page = 3;
$page = '';
$output = '';
if (isset($_POST["page"])) {
    $page = $_POST["page"];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $record_per_page;
$query = "SELECT * FROM blog WHERE status = 'ACTIVE' ORDER BY date_post DESC LIMIT $start_from, $record_per_page";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result)) {
    $thumbnail_blog = $row['thumbnail_artikel'];
    $isi_artikel_full = $row['isi_artikel'];
    $isi_artikel = substr($isi_artikel_full, 0, 100);
    $tanggal_upload = date("d-m-Y", strtotime($row['date_post']));
?>
    <div class="card mb-3" style="max-width: auto;">
        <div class="row g-0">
            <div class="col-md-4">
                <img <?php echo "src = '../blog_thumbnail/" . $thumbnail_blog . "'";  ?> class="card-img-top img-fluid">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $row['judul'] ?></h5>
                    <p class="card-text"><?= $isi_artikel . '...'  ?></p>
                    <p class="card-text"><small class="text-muted"><?= lama_baca_teks($isi_artikel_full); ?></small></p>
                    <a href="isi_blog.php?judul=<?= $row['judul'] ?>" class="text-reset">
                        Read More..
                        <img width="13" src="https://cdn0.astonhotelsinternational.com/Images/v1/BrandPages/Icon/asst-icn-arrow-right.svg">
                    </a>
                    <p class="card-text"><small class="text-muted"><?= tanggal_indo($tanggal_upload, true)  ?></small></p>
                </div>
            </div>
        </div>
    </div>
<?php
}
$page_query = "SELECT * FROM blog WHERE status = 'ACTIVE' ORDER BY date_post DESC";
$page_result = mysqli_query($conn, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records / $record_per_page);
?>
<nav aria-label="Page navigation example" class="d-flex justify-content-center">
    <ul class="pagination">
        <li class="page-item pagination_back">
            <a class="page-link pagination_back" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php

        for ($i = 1; $i <= $total_pages; $i++) {
            $output .= "<li class='page-item pagination_link' id='" . $i . "'><a class='page-link pagination_link' id='" . $i . "'>" . $i . "</a></li>";
        }

        $output .= '</div><br /><br />';
        echo $output; ?>
        <li class="page-item pagination_next">
            <a class="page-link pagination_next" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>