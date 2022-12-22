-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 22, 2022 at 04:15 PM
-- Server version: 8.0.31-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shikifuj_hotel_shikifujin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `nama`, `password`) VALUES
('reza', 'reza muhammad thalib', 'bb98b1d0b523d5e783f931550d7702b6');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `judul` varchar(100) NOT NULL,
  `date_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isi_artikel` text NOT NULL,
  `thumbnail_artikel` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ACTIVE',
  `views` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`judul`, `date_post`, `isi_artikel`, `thumbnail_artikel`, `status`, `views`) VALUES
('Ashiappp', '2022-12-20 17:22:08', '<p>Testing Testing</p>\r\n', 'IMG-63a18cd0abedf5.87947450.jpg', 'ACTIVE', 1),
('Belajar Budaya Jepang di Hotel Shikifujin', '2022-11-24 00:00:00', '<p>Jepang, dikenal dunia sebagai negara yang paling maju, modern, dan canggih; namun mereka tetap melestarikan budaya mereka hingga kini. Inilah yang membuat dunia penasaran, seperti apa sih budaya Jepang sebenarnya? Nah, bila kalian berencana melanjutkan studi ke Jepang, atau menerima beasiswa ke Jepang; atau hanya sekedar berlibur. Sebelum berangkat coba kalian kenali dulu nih, budaya di Jepang itu kira-kira seperti apa ya&hellip;. Hal ini sangat penting untuk perbekalan sebelum sobat BJB hidup di Jepang. Persiapan awal nih, kamu harus tahu kebiasaan sehari-hari orang-orang Jepang itu seperti apa, bagaimana pengucapan sapaan dalam bahasa Jepang hingga macam-macam budaya yang ada di&nbsp; Jepang.</p>\r\n\r\n<p>Budaya Jepang itu banyak sekali macamnya, mulai dari pakaian&nbsp; tradisional yang terkenal; yaitu&nbsp;<em>kimono&nbsp;</em>（着物）. Kimono dulu digunakan oleh masyarakat Jepang untuk kegiatan sehari-hari; namun kini hanya pada acara tertentu saja. Kimono pria dan wanita biasanya memiliki perbedaan pada desain, motif dan juga warna. Kimono pria cenderung simple dengan warna cenderung gelap. Sedangkan wanita, dibuat dengan warna cerah warna-warni berikut dengan motif bunga sakura yang khas.</p>\r\n\r\n<p>Selain pakaian tradisional juga ada sebuah permainan tradisional Jepang yang masih dimainkan hingga saat ini; permainan ini mirip sekali dengan catur dan di Jepang dikenal dengan nama Shogi (将棋). Satu set Shogi berjumlah 20 buah dan dimainkan oleh dua orang pemain di atas papan 9 lajur dan 9 baris berwarna sama. Cara bermainnya mirip dengan catur yang membedakannya hanya sistem permainannya, dimana saat bermain Shogi pemain lawan bisa memainkan kembali buah catur lawan yang sudah ditangkap.&nbsp;</p>\r\n\r\n<p>Nah, sekarang kita agak bergeser ke kebudayaan Jepang yang sudah modern. Dalam budaya Jepang yang modern ada banyak sekali budaya yang populer seperti Manga, Anime hingga Cosplay. Di Jepang pun juga ada kebiasaan setelah bekerja atau sekolah, orang-orang Jepang suka singgah sebentar pada minimarket hanya sekedar untuk membaca komik Manga yang mereka sukai. Kebiasaan membaca di sebuah minimarket ini tentu sudah bukan hal yang asing bagi masyarakat di sana, bahkan ada juga orang yang asyik membaca hingga hampir larut malam sampai pemilik toko memintanya untuk pindah tempat karena sudah jamnya tutup. Wah, bisa sampai segitunya ya&hellip;</p>\r\n\r\n<p>Berikut di bawah ini adalah tambahan beberapa poin tentang budaya dan kebiasaan orang Jepang ditambah dengan beberapa kosakata dasar Jepang yang harus kamu kuasai. Let&rsquo;s check it out.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>1. Cara Mengucap Salam di Jepang</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Orang Jepang memiliki kebiasaan saat memberi atau mengucapkan salam mereka membungkuk kepada lawan bicaranya. Ini adalah sebuah gestur tubuh untuk mengungkapkan rasa hormat kepada orang yang lebih dewasa. Untuk pengucapan salamnya seperti ini;&nbsp;<em>ohayo gozaimasu</em>&nbsp;(selamat pagi),&nbsp;<em>konnichiwa</em>&nbsp;(selamat siang),&nbsp;<em>konbanwa</em>&nbsp;(selamat sore atau malam),&nbsp;<em>arigato gozaimasu</em>&nbsp;(terima kasih),&nbsp;<em>sumimasen</em>&nbsp;(maaf/permisi) dan seterusnya.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>2. Kebiasaan saat Makan di Jepang&nbsp;</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nah, bila di Indonesia sudah terbiasa kita menggunakan sendok, garpu bahkan tanpa alat makan alias hanya menggunakan tangan saja. Di Jepang kalian nanti akan mempergunakan sumpit pada saat makan. Sumpit biasanya ada yang terbuat dari bambu, kayu, hingga stainless steel. Cara menggunakannya cukup simpel; cukup selipkan sumpit di jari telunjuk dan di jari tengah, lalu tahan sumpit dengan menggunakan ibu jari dan jari manis.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>3. Mengunjungi Rumah Orang Jepang</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Seperti di Indonesia pada umumnya, bila hendak berkunjung ke rumah orang lain, atau teman di Jepang hendaknya mengucapkan salam;&nbsp;<em>gomen kudasai</em>&nbsp;atau&nbsp;<em>sumimasen</em>&nbsp;(permisi). Kebiasaan di sana saat ingin memasuki rumah orang lain, atau restoran tertentu kalian harus melepas alas kaki dan menggantinya dengan sandal rumah. Namun, saat kamu memasuki ruangan tradisional yang dikenal dengan tatami kamu harus melepas sandal rumah yang kamu kenakan. Nah, satu info penting juga yang kalian harus tahu, bahwa ada dua jenis sandal yang disediakan di Jepang; sandal rumah dan sandal untuk masuk toilet. Jangan sampai salah ya..</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>4. Budaya Minum&nbsp; di Jepang</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Di Jepang, budaya minum ini sudah ada sejak jaman dulu; budaya minum teh pada upacara teh dan budaya minum sake. Budaya minum ini biasanya dilakukan bersama teman, rekan bisnis, bahkan keluarga. Tradisi minum ini sama persis seperti budaya di Korea Selatan yang mana salah satunya menuangkan air teh atau sake ke dalam gelas orang yang lebih tua atau yang lebih dihormati. Jangan pernah biarkan gelas kamu kosong. Bila kamu membiarkannya kosong ini artinya kamu minta tambah lagi.&nbsp;<em>Kanpai&nbsp;</em>!!!! :)&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>5. Menggunakan Fasilitas Umum</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Hampir seluruh masyarakat Jepang menggunakan fasilitas umum bila ingin bepergian; sebagian besar mereka bepergian dengan menggunakan kereta api, trem, bus, hingga menggunakan taksi. Nah, di Jepang bila kamu sedang mengendarai taksi kalian harus tahu tentang hal ini; saat kalian berada di dalam taksi, maka otomatis pintu taksi akan terkunci sedangkan saat menjelang berhenti di tujuan; otomatis pintu taksi akan terbuka. Selain menggunakan fasilitas umum yang ada, tak jarang orang Jepang pun pergi beraktivitas; seperti sekolah ataupun ke kantor dengan mengayuh sepeda yang mereka miliki. Wah, luar biasa banget ya! Negara maju namun tetap memperhatikan lingkungan di sekitarnya.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>6. Banyaknya Pemandian Umum&nbsp;</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Saat kamu di Jepang, jangan heran apabila kamu menemukan banyaknya pemandian umum di sini. Fasilitas pemandian umum di Jepang berawal dari sini; jaman dulu di Jepang tidak semua rumah memiliki bak air panas di rumah mereka. Dari sinilah, pengusaha di sana membuka fasilitas pemandian umum. Pemandian umum di Jepang umumnya buka selama 24 jam, jam - jam paling ramai biasanya saat malam hari setelah orang selesai bekerja atau pada saat weekend. Di sini, selain bisa merilekskan badan, akan bertemu dengan orang baru, bahkan sahabat lama; dan nostalgia membicarakan hal-hal yang dulu pun dilakukan. Sangat asyik bukan, istirahat di sebuah pemandian air panas sekaligus bercengkrama dengan teman.&nbsp;</p>\r\n', 'IMG-63959885f368a2.62472794.jpg', 'ACTIVE', 673),
('Diskon Khusus Wibu Yang Berkunjung Ke Shikifujin Hotel', '2022-11-24 10:23:09', '<p><strong>Wibu</strong>&nbsp;berasal dari kata &#39;weaboo&#39; merupakan sebutan untuk penggila &quot;Japanese Culture&quot; seperti manga, anime, LN, cosplay, dan sebagainya. Lalu apa bedanya dengan&nbsp;<strong>Otaku</strong>? Pada awalnya otaku merupakan sebuah nama komunitas yang kemudian mulai digunakan untuk menamai orang-orang yang menekuni hobinya. Menurut analisa Wibupedia sendiri, sebenarnya antara otaku dan wibu tidak jauh berbeda. Hanya saja banyak argumen-argumen orang lain yang mengidentifikasi hanya berdasar pendapat pribadi tanpa melihat fakta yang ada, sehingga banyak perbedaan mengenai wibu dan otaku.<br />\r\n<br />\r\nPada kesempatan kali ini Wibupedia akan menjelaskan tentang seseorang yang disebut-sebut sebagai wibu dalam artian seorang yang sudah tergila-gila terhadap dunia animasi&nbsp;<em>jejepangan</em>&nbsp;termasuk otaku. Mungkin pembaca sering mendengar tentang wibu/otaku yang disebut-sebut sebagai sampah masyarakat? Atau mungkin disebut-sebut sebagai sosok yang anti-sosial dan tertutup? Simak penjelasan mengenai fakta-fakta wibu berikut ini.<br />\r\n&nbsp;</p>\r\n\r\n<h2>1. Introvert, Anti-sosial, Hikikomori?&nbsp;</h2>\r\n\r\n<p>Banyak yang bilang jika wibu itu adalah sosok yang sangat tertutup, introvert, anti-sosial, bahkan hikikomori. Namun sebenarnya tidak semuanya benar. Introvert merupakan sifat seseorang dimana dirinya cenderung pendiam dan berkebalikan dengan ekstrovert yang cenderung banyak bicara. Sementara itu hikikomori dan anti-sosial dapat diartikan sebagai seseorang yang enggan bersosialisasi dengan orang lain. Apakah benar begitu?<br />\r\n<br />\r\nSeorang wibu sebenarnya bukanlah sosok yang pendiam, hanya saja mereka tau dimana mereka harus berbicara. Hal ini karena mereka tidak suka membuang waktu mereka untuk pembicaraan omong kosong yang tidak berguna. Namun adakalanya mereka banyak bicara dan susah dihentikan. Misalnya saat menonton anime bersama, tidak jarang ada yang memberikan &#39;banjir spoiler&#39; kepada teman lainnya. Kemudian saat mereka aktif dalam komunitas seperti group facebook, tidak jarang mereka yang banyak bicara dan berdebat hanya karena perbedaan pendapat. Tentu saja masih banyak bukti lain yang memperlihatkan bahwa wibu bukanlah sosok yang introvert. Jika memang ada dari mereka yang introvert, mungkin karena beberapa alasan seperti tidak memiliki teman yang sejalan dengan hobinya.<br />\r\n<br />\r\nApakah seorang wibu enggan bersosialisasi? Jika banyak yang berpendapat seperti itu mungkin jawabannya sangat salah. Seorang wibu dan hikikomori justru sosok yang handal dalam bersosialisasi. Hanya saja, satu poin penting yang benar adalah&nbsp;seorang wibu tidak pandai memulai bersosialisasi. Hal ini karena mereka cenderung banyak bicara saat terdapat topik yang berkaitan dengan hal yang sejalan dengan mereka. Misalnya saat kita pertama kali masuk kelas baru, kemudian ada teman kita yang memiliki hobi sama yaitu menonton dan mengoleksi anime bajakan, tentu saja kita dengan spontan akan berteman dengannya bahkan mungkin sebelum kita mengetahui namanya kita sudah berbaur karena hobi tersebut.<br />\r\n&nbsp;</p>\r\n\r\n<h2>2. Sampah Masyarakat</h2>\r\n\r\n<p>Apakah pembaca tau dengan benar definisi sampah masyarakat? Menurut pemikiran Wibupedia, &#39;sampah masyarakat&#39; ialah seseorang yang dibuang dan dikucilkan dari masyarakat dalam artian tidak dianggap anggota masyarakat. Hal ini dapat terjadi karena seseorang tersebut melakukan kesalahan yang dianggap fatal dan harus mendapat sanksi sosial yaitu dibuang. Karena merasa dibuang maka seseorang tersebut sudah dipastikan akan sendiri dan tertutup.<br />\r\n<br />\r\nLalu bagaimana dengan wibu? Otaku? Mari kita bandingkan fakta dengan opini tersebut. Jika seorang wibu dikatakan sampah masyarakat mungkin alasannya karena sifat tertutup dimana dikarenakan dirinya tidak memiliki teman sejalan. Hal ini mengakibatkan dirinya dikucilkan. Tapi apakah hal tersebut dapat dikategorikan sebagai sebab-akibat yang benar dari sampah masyarakat?<br />\r\n<br />\r\nPernyataan tersebut sebenarnya salah kaprah. Meskipun seorang wibu yang paling tertutup-pun pasti akan mengambil peran dalam masyarakat. Pada dasarnya&nbsp;semua itu tergantung kepada lingkungan masyarakatnya juga.&nbsp;Misalnya Wibupedia yang hidup diperdesaan. Wibupedia termasuk sosok yang tertutup akan tetapi masyarakat sekitar masih menganggap keberadaan Wibupedia karena mereka sadar menjadi sosok tertutup bukanlah kesalahan yang pantas dijatuhi sanksi sosial. Jadi saat terdapat acara seperti kondangan (adat orang Indonesia terutama Jawa) Wibupedia tetap mendapat undangan dan berusaha hadir. Lain halnya dengan wibu tertutup yang hidup diperkotaan yang cenderung masyarakatnya berbaur dari berbagai macam daerah dengan tujuan ekonomi atau profesi. Mereka pasti acuh tak acuh dengan lingkungan sehingga sosok seperti wibu dijadikan target sebagai sampah masyarakat. Padahal itu juga karena kesalahan mereka. Intinya seorang wibu pasti memili prinsip &quot;Kami hanya bersifat hangat kepada orang yang menganggap keberadaan kami&quot;.<br />\r\n<br />\r\nTentu saja masih banyak bukti lain yang mematahkan fakta bahwa wibu atau otaku merupakan sampah masyarakat. Karena wibu tidak ada kaitannya dengan kesalahan yang patut dijatuhi sanksi sosial.</p>\r\n', 'IMG-639598f617f5a3.97758321.jpg', 'ACTIVE', 522),
('Harta Karun One Piece Ditemukan Di Shikifujin Hotel', '2022-11-24 10:24:48', '<p>Bagi Anda yang baru mengetahui manga atau anime ini, mungkin bertanya One piece itu apa . One piece&nbsp;merupakan seri manga Jepang yang ditulis dan diilustrasikan oleh Eichiro Oda</p>\r\n\r\n<p>Akan tetapi dalam cerita manga karya Oda ini juga terdapat istilah One Piece yang merujuk pada harta karun terbesar yang diburu para bajak laut. Harta karun itu hingga saat ini pun belum diketahui wujud, bentuk ataupun gambarnya, sang kreator masih menyembunyikan One Piece. Hal ini membuat para fans bertanya-tanya&nbsp;<em><strong>One Piece itu apa</strong></em>.</p>\r\n\r\n<p><a href=\"https://www.suara.com/tag/manga-one-piece\">Manga One Piece</a>&nbsp;terbit lebih dahulu secara seri di majalah manga shonen Shueisha Weekly Shonen Jump sejak Juli 1997. Manga One Piece sudah disusun menjadi 101 volume tankbon pada Desember 2021. Untuk tahu lebih banyak One Piece itu apa, silahkan cek artikel ini sampai akhir.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Plot One Piece</h2>\r\n\r\n<p>Plot cerita One Piece itu apa, yang jelas adalah mengikuti petualangan Monkey D.&nbsp;<a href=\"https://www.suara.com/tag/luffy\">Luffy</a>, seorang anak laki-laki yang secara tidak sengaja memakan buah iblis yang membuat tubuhnya menjadi seperti karet. Konsekuensinya, Luffy tidak bisa berenang di laut. Sadar akan kelemahannya, Luffy tidak mundur dari tekadnya untuk mewujudkan kru bajak lautnya sendiri dan menjadi bajak laut.&nbsp;</p>\r\n\r\n<p>Luffy berhasil mengumpulkan kru dan menamai kru bajak lautnya, Bajak Laut Topi Jerami. Luffy menjelajahi Grand Line untuk mencari harta karun utama dunia yang dikenal sebagai &quot;One Piece&quot; untuk menjadi Raja Bajak Laut berikutnya.</p>\r\n\r\n<p>Merujuk pada penjelasan plot di atas. One Piece itu apa, tidak hanya dapat dijawab sebagai manga karya Eiichiro Oda melainkan juga ide utama dari One Piece itu sendiri.</p>\r\n\r\n<p>Oda menjelaskan dalam serinya bahwa One Piece adalah harta karun utama di dunia yang ditinggalkan oleh bajak laut legendaris, Gold D. Roger. Namun hingga chapter terbaru yang rilis baru-baru ini pun belum menjelaskan One Piece itu apa dengan gamblang.</p>\r\n\r\n<p>Hal ini membuat para fans penasaran hingga melontarkan beberapa teori. Salah satu&nbsp;<em>clue</em>&nbsp;<a href=\"https://www.suara.com/tag/harta-karun-one-piece\">harta karun One Piece</a>&nbsp;adalah harta karun itu ditemukan oleh Gold D. Roger di Laugh Tale. Dimana sebelumnya, harta karun itu disimpan oleh Joy Boy.</p>\r\n\r\n<p>Namun bukan hal yang mudah Roger menemukan&nbsp;<a href=\"https://www.suara.com/tag/one-piece\">One Piece</a>. Ia sebelumnya harus mengumpulkan 4 Road Poneglyph yang ada di seluruh penjuru lautan.</p>\r\n\r\n<p>Lokasi Laugh Tale pun hingga saat ini belum diketahui. Menariknya, Roger saat menemukan harta karun itu hanya bisa tertawa dan berkata &quot;Oh Joy Boy, saya berharap lahir di zaman Anda.&quot;</p>\r\n\r\n<p>Sementara itu Oda Sensei sendiri mengungkapkan bahwa selain ada One Piece, jika kru Bajak Laut Topi Jerami berhasil mencapai Laugh Tale akan ada &quot;hadiah&quot; yang mereka dapatkan, bukan hanya persahabatan. Tapi Oda tidak mengatakan apakah hadiah itu berupa emas,&nbsp;</p>\r\n\r\n<p>Manga One Piece telah menerima banyak cinta dari penggemar anime. Alasan umum kenapa One Piece disukai oleh penggemar di seluruh dunia adalah karena plot, seni gambar, karakterisasi, dan humor yang ada dalam alurnya&nbsp; membuat emosi penonton terhanyut dan merasa&nbsp;<em>relate</em>&nbsp;dengan kehidupan mereka.</p>\r\n\r\n<p>Perasaan &#39;kedekatan&#39; inilah yang membangun hubungan kuat antara One Piece dengan penggemarnya. Para kritikus, pengulas, dan pembaca yang bukan bagian dari fandom pun mengakui bahwa One Piece adalah salah satu manga terbaik sepanjang masa.&nbsp;</p>\r\n', 'IMG-639599d7c88765.62653621.jpg', 'ACTIVE', 1423),
('Kajian Rutin di Hotel Shikifujin', '2022-11-30 14:41:27', '<p>Saudaraku, mari kita kembalikan nikmatnya ilmu dan nikmatnya majelis ilmu serta berbahagia di majelis ilmu, yaitu dengan:</p>\r\n\r\n<p>1. Belajar serius dan bersungguh-sungguh, bukan dengan terlalu banyak tertawa dan guyonan saja di majelis ilmu</p>\r\n\r\n<p>2. Belajar dengan materi berisi ilmu berupa tauhid, aqidah, fikih, adab dan akhlak serta ilmu-ilmu ushul seperti bahasa arab, ushul fikh, ushul tafsir dan lain-lainnya. Bukan hanya berisikan cerita-cerita saja, motivasi-motivasi saja atau terlalu banyak politik praktis lalu lupa dengan tauhid dan aqidah</p>\r\n\r\n<p>3. Mencatat dengan fokus dan rajin serta menyimpulkan ketika mencatat, bukan dengan hanya mendengar saja kemudian lupa, apalagi sibuk dengan urusan lain seperti terlalu sibuk memfoto ustadz dan keadaan sekitar kajian untuk di upluad, terlalu sibuk berbicara dengan teman sebelahnya dan lain-lain</p>\r\n\r\n<p>4. Kajian rutin (misalnya sepekan sekali) menyelesaikan buku tertentu di depan ustadz/ulama yang menjelaskan buku tersebut, bukan hanya kajian tematik yang temanya tidak tetap (apalagi hanya pilih-pilih tema yang disukai saja) dan (maaf) &ldquo;kajian semau gue&rdquo; mau datang atau tidak datang terserah dia. Dia tidak pernah sekalipun punya keinginan belajar di kajian rutin padahal fasilitas ada.</p>\r\n\r\n<p>Saudaraku, memang secara umum majelis ilmu adalah kenikmatan dan kebahagiaan. Di majelis ilmu lah kita merasakan manisnya iman dan kebahagiaan yang sejati.</p>\r\n\r\n<p>Majelis ilmu adalah taman surga, seseorang akan merasa tenang dan bahagia apabila berada di taman yang indah apalagi taman itu adalah surga.</p>\r\n\r\n<p>Rasulullah&nbsp;<em>shallallahu &lsquo;alaihi wa sallam</em>&nbsp;bersabda,</p>\r\n\r\n<h2>عَنْ أَنَسِ بْنِ مَالِكٍ رَضِي اللَّهُ عَنْهُ أَنَّ رَسُولَ اللَّهِ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ قَالَ إِذَا مَرَرْتُمْ بِرِيَاضِ الْجَنَّةِ فَارْتَعُوا قَالُوا وَمَا رِيَاضُ الْجَنَّةِ قَالَ حِلَقُ الذِّكْرِ</h2>\r\n\r\n<p><em>Dari Anas bin Malik Radhiyallahu &lsquo;anhu, bahwa Rasulullah Shallallahu &lsquo;alaihi wa sallam bersabda,&rdquo;Jika k</em><strong><em>amu melewati taman-taman surga, maka singgahlah dengan senang.&rdquo;&nbsp;</em></strong><em>Para sahabat bertanya,&rdquo;Apakah taman-taman surga itu?&rdquo; Beliau menjawab</em><strong><em>,&rdquo;Halaqah-halaqah (kelompok-kelompok) dzikir.&rdquo;</em></strong>&nbsp;<strong>[HR Tirmidzi, no. 3510, Ash Shahihah, no. 2562.]</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>Pentingnya Kajian Bagi Umat Manusia</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Di majelis ilmu lah kita merasakan manisnya iman dan kebahagiaan yang sejati. Majelis ilmu adalah taman surga, seseorang akan merasa tenang dan bahagia apabila berada di taman yang indah apalagi taman itu adalah surga. Majelis ilmu bukan tempatnya terlalu banyak tertawa dan guyon, tetapi tempat serius dan rendah hati memohon kepada Allah ilmu dan berkahnya. Boleh saja guyon dan bercanda, tapi tidak boleh terlalu banyak karena akan mengeraskan hati,.</p>\r\n\r\n<p>Sebagian orang HANYA suka pada kajian yang banyak bercanda dan guyonnya, mereka sangka itulah kajian ilmu yang nyaman dan enak. Bukan berisikan hanya cerita-cerita saja, motivasi-motivasi saja atau terlalu banyak politik praktis lalu lupa dengan tauhid dan aqidah. Majelis ilmu berisi tentang ilmu agama, bukan urusan-urusan dunia atau sekedar motivasi dunia saja. Bukan dengan hanya mendengar saja kemudian lupa, apalagi sibuk dengan urusan lain seperti terlalu sibuk memfoto ustadz dan keadaan sekitar kajian untuk di upluad, terlalu sibuk berbicara dengan teman sebelahnya dan lain-lain. Bukan hanya kajian tematik yang temanya tidak tetap (apalagi hanya pilih-pilih tema yang disukai saja) dan (maaf) &ldquo;kajian semau gue&rdquo; mau datang atau tidak datang terserah dia. Dia tidak pernah sekalipun punya keinginan belajar di kajian rutin padahal fasilitas ada. ya begitulah.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>1. Belajar serius dan bersungguh-sungguh, bukan dengan terlalu banyak tertawa dan guyonan di majelis ilmu</h3>\r\n\r\n<p>Majelis ilmu bukan tempatnya terlalu banyak tertawa dan guyon, tetapi tempat serius dan rendah hati memohon kepada Allah ilmu dan berkahnya. Boleh saja guyon dan bercanda, tapi tidak boleh terlalu banyak karena akan mengeraskan hati,. Sebagian orang HANYA suka pada kajian yang banyak bercanda dan guyonnya, mereka sangka itulah kajian ilmu yang nyaman dan enak.</p>\r\n\r\n<p>Perhatikan bagaimana majelis ilmu di zaman dahulu. Imam Adz Dzahabi&nbsp;<em>rahimahullah</em>&nbsp;menyampaikan kisah Ahmad bin Sinan, ketika beliau berkata,</p>\r\n\r\n<h2>كان عبد الرحمن لا يتحدث في مجلسه ولا يبرى قلم ولا يقوم أحد كأنما على رءوسهم الطير أو كأنهم في صلاة</h2>\r\n\r\n<p><em>&ldquo;Tidak&nbsp;</em><strong><em>ada seorangpun yang bercakap-cakap</em></strong><em>&nbsp;di majelis Abdurrahman bin Mahdi. Pena tak bersuara. Tidak ada yang bangkit.&nbsp;</em><strong><em>Seakan-akan di kepala mereka ada burung atau seakan-akan mereka berada dalam shalat.</em></strong><em>&rdquo;&nbsp;</em><strong>[Tadzkiratul Hufadz 1/242]</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>2. Belajar dengan materi berisi ilmu berupa tauhid, aqidah, fikih, adab dan akhlak serta ilmu-ilmu ushul seperti bahasa arab, ushul fikh, ushul tafsir dan lain-lainnya.</h3>\r\n\r\n<p>Bukan berisikan hanya cerita-cerita saja, motivasi-motivasi saja atau terlalu banyak politik praktis lalu lupa dengan tauhid dan aqidah.&nbsp;Majelis ilmu berisi tentang ilmu agama, bukan urusan-urusan dunia atau sekedar motivasi dunia saja.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>3. Mencatat dengan fokus dan rajin serta menyimpulkan ketika mencatat</h3>\r\n\r\n<p>Bukan dengan hanya mendengar saja kemudian lupa, apalagi sibuk dengan urusan lain seperti terlalu sibuk memfoto ustadz dan keadaan sekitar kajian untuk di upluad, terlalu sibuk berbicara dengan teman sebelahnya dan lain-lain.</p>\r\n\r\n<p>Ilmu tersebut dengan mencatatnya, ini adalah bimbingan dari Rasulullah&nbsp;<em>shallallaahu &lsquo;alaihi wa sallam,</em>beliau bersabda,</p>\r\n\r\n<h2>قَيِّدُوا الْعِلْمَ بِالْكِتَابِ</h2>\r\n\r\n<p><em>&ldquo;Ikatlah ilmu dengan dengan menulisnya&rdquo;&nbsp;</em><strong>[Silsilah Ash-Shahiihah no. 2026]</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>4. Kajian rutin (misalnya sepekan sekali) menyelesaikan buku tertentu di depan ustadz/ulama yang menjelaskan buku tersebut</h3>\r\n\r\n<p>Bukan hanya kajian tematik yang temanya tidak tetap (apalagi hanya pilih-pilih tema yang disukai saja) dan (maaf) &ldquo;kajian semau gue&rdquo; mau datang atau tidak datang terserah dia. Dia tidak pernah sekalipun punya keinginan belajar di kajian rutin padahal fasilitas ada.</p>\r\n\r\n<p>Saudaraku, ketika menghadiri kajian tematik kita akan merasakan lezatnya ilmu dan kebahagiaan ilmu, akan tetapi apabila tidak diikuti dengan menghadiri kajian rutin membahas buku, maka kajian tematik lama-kelamaan akan membosankan dan bisa jadi pemahamannya akan setengah-setengah.</p>\r\n\r\n<p>Perhatikan penjelasan Syaikh Muhammad Shalih bin Al-&lsquo;Utsaimin berikut,</p>\r\n\r\n<h2>ألا يأخذ من كل كتاب نتفة، أو من كل فن قطعة ثم يترك؛ لأن هذا الذي يضر الطالب، ويقطع عليه الأيام بلا فائدة، فمثلاً بعض الطلاب يقرأ في النحو : في الأجرومية ومرة في متن قطر الندي، ومرة في الألفية. ..وكذلك في الفقه: مرة في زاد المستقنع، ومرة في عمدة الفقه، ومرة في المغني ، ومرة في شرح المهذب، وهكذا في كل كتاب، وهلم جرا ، هذا في الغالب لا يحصلُ علماً، ولو حصل علماً فإنه يحصل مسائل لا أصولاً</h2>\r\n\r\n<p><strong><em>&ldquo;</em></strong><em>Janganlah mempelajari buku sedikit-sedikit, atau setiap cabang ilmu sepotong-sepotong kemudian meninggalkannya,</em>&nbsp;<em>karena ini membahayakan bagi penuntut ilmu dan menghabiskan waktunya tanpa faidah, misalnya sebagian penuntut ilmu memperlajari ilmu nahwu, ia belajar kitab Al-Jurumiyah sebentar kemudian berpindah ke Matan Qathrun nadyi kemudian berpindah ke Matan Al-Alfiyah..demikian juga ketika mempelajari fikih, belajar Zadul mustaqni sebentar, kemudian Umdatul fiqh sebentar kemudian Al-Mughni kemudian Syarh Al-Muhazzab, dan seterusnya.&nbsp;</em><strong><em>Cara seperti Ini umumnya tidak mendapatkan ilmu, seandainya ia memperoleh ilmu, maka ia tidak memperoleh kaidah-kaidah dan dasar-dasar.&rdquo;&nbsp;</em></strong><strong>[Kitabul &lsquo;ilmi syaikh &lsquo;Utsaimin hal. 39]</strong></p>\r\n\r\n<p>Semoga kita bisa merasakan nikmatnya majelis ilmu yang sesungguhnya dan ketenangan yang membawa kepada kebahagiaan. Sebagaimana sabda Nabi&nbsp;<em>shallallahu &lsquo;alaihi wa sallam</em>,</p>\r\n\r\n<h2>وَمَا اجْتَمَعَ قَوْمٌ فِي بَيْتٍ مِنْ بُيُوتِ اللَّهِ يَتْلُونَ كِتَابَ اللَّهِ وَيَتَدَارَسُونَهُ بَيْنَهُمْ إِلَّا نَزَلَتْ عَلَيْهِمُ السَّكِينَةُ وَغَشِيَتْهُمُ الرَّحْمَةُ وَحَفَّتْهُمُ الْمَلَائِكَةُ وَذَكَرَهُمُ اللَّهُ فِيمَنْ عِنْدَهُ</h2>\r\n\r\n<p><em>Dan tidaklah sekelompok orang&nbsp;</em><strong><em>berkumpul di dalam satu rumah di antara rumah-rumah Allah; mereka membaca Kitab Allah dan saling belajar diantara mereka, kecuali ketenangan turun kepada mereka,&nbsp;</em></strong><em>rahmat meliputi mereka, malaikat mengelilingi mereka, dan Allah menyebut-nyebut mereka di kalangan (para malaikat) di hadapanNya.&rdquo;</em><strong>&nbsp;[HR Muslim]</strong></p>\r\n\r\n<p>Al Hafizh Ibnu Hajar Al Asqalani&nbsp;<em>rahimahullah</em>&nbsp;berkata,</p>\r\n\r\n<h2>المراد بمجالس الذكر وأنها التي تشتمل على ذكر الله بأنواع الذكر الواردة من تسبيح وتكبير وغيرهما وعلى تلاوة كتاب الله سبحانه وتعالى وعلى الدعاء بخيري الدنيا والآخرة وفي دخول قراءة الحديث النبوي ومدارسة العلم الشرعي ومذاكرته والاجتماع على صلاة النافلة في هذه المجالس نظر والأشبه اختصاص ذلك بمجالس التسبيح والتكبير ونحوهما والتلاوة حسب وإن كانت قراءة الحديث ومدارسة العلم والمناظرة فيه من جملة ما يدخل تحت مسمى ذكر الله تعالى</h2>\r\n\r\n<p><em>&ldquo;Yang dimaksud dengan majelis-majelis dzikir adalah mencakup majlis-majlis yang berisi dzikrullah, dengan macam-macam dzikir yang ada (tuntunannya, Pent) berupa tasbih, takbir, dan lainnya. Juga yang berisi bacaan Kitab Allah Azza wa Jalla dan berisi doa kebaikan dunia dan akhirat. Dan menghadiri majelis pembacaan hadits Nabi, mempelajari ilmu agama, mengulang-ulanginya, berkumpul melakukan shalat nafilah (sunah) ke dalam majlis-majlis dzikir adalah suatu visi.</em>&nbsp;<em>Yang</em>&nbsp;<em>lebih nyata</em>,&nbsp;<em>majlis-majlis dzikir adalah lebih khusus pada majlis-majlis tasbih, takbir dan lainnya, juga qiraatul Qur&rsquo;an saja</em><strong><em>.&nbsp;</em></strong><em>Walaupun pembacaan hadits, mempelajari dan berdiskusi ilmu (agama) termasuk jumlah yang masuk di bawah istilah dzikrullah Ta&rsquo;ala&rdquo;</em>.&nbsp;<strong>[Fathul Bari, 11/212]</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n', 'IMG-638e0aec370af6.29948548.jpg', 'ACTIVE', 954),
('Makanan Gratis Tiap Jumat Di Hotel Shikifujin', '2022-11-24 10:26:15', '<p>Sebagai bentuk meringankan beban masyarakat di tengah Pandemi Covid-19, pengurus Masjid Agung Jami&#39; Singaraja menyediakan makanan gratis untuk masyarakat umum.</p>\r\n\r\n<p>Makanan tersebut disajikan secara prasmanan di halaman Masjid setiap hari mulai pukul 12.30 Wita.</p>\r\n\r\n<p>Humas Masjid Agung Jami&#39; Singaraja, Muhammad Agil ditemui Rabu 7 Juli 2021 mengatakan, program menyediakan makanan gratis ini sudah dijalani sejak awal pandemi atau pada 2020 lalu.</p>\r\n\r\n<p>Ini berangkat dari hadis Rasulullah yang menyatakan pemberian sedekah terbaik adalah dengan memberikan makanan.</p>\r\n\r\n<p>Oleh karena itu, pihaknya pun mencoba memberikan sedekah terbaik itu kepada umat masyarakat dengan membuka stand makan siang gratis untuk masyarakat umum.</p>\r\n\r\n<p>Selain itu kata Agil, program ini juga bertujuan untuk menarik jamaah datang ke masjid.</p>\r\n\r\n<p>Sebab beberapa waktu belakangan ini, situasi masjid utamanya saat shalat dzuhur sepi.</p>\r\n\r\n<p>&quot;Semoga dengan adanya program ini, bisa menambah minat yang biasanya kalau siang itu pulang, bisa datang ke masjid sekalian shalat dan makan siang. Intinya juga untuk membantu ekonomi masyarakat,&quot; terangnya.</p>\r\n\r\n<p>Agil menyebut, setiap hari pihaknya menyediakan makanan rumahan hingga sebanyak 110 porsi dengan disajikan secara prasmanan.</p>\r\n\r\n<p>Makanan itu dimasak oleh warga sekitar yang dananya bersumber dari kas kotak amal.</p>\r\n\r\n<p>&quot;Setiap hari makanan yang disajikan simpel, makanan rumahan. Kami juga memperhatikan komposisinya, ada protein, daging dan sayur,&quot; jelasnya. (*)</p>\r\n', 'IMG-63959a2b1f0908.70866374.jpg', 'ACTIVE', 662),
('Makanan Khas Jawa di Hotel Shikifujin', '2022-11-30 21:43:35', 'Pecel\r\n\r\nPecel merupakan makanan khas Jawa yang mungkin bisa kamu temukan di mana-mana. Pecel berisi aneka sayuran rebus seperti kangkung, bayam, tauge, daun singkong dan banyak lainnya. Sayuran ini kemudian disiram dengan bumbu kacang.\r\n\r\nGudeg\r\n\r\nMakanan khas Jawa satu ini sudah sangat terkenal, dan menjadi ikon wisata kuliner di kota Yogyakarta. Hampir di setiap sudut Yogyakarta kamu dapat dengan mudah menemui makanan yang bercita rasa manis ini.\r\n\r\nMakanan tradisional ini terbuat dari buah nangka muda yang dimasak dengan santan dan gula serta daun jadi untuk menghasilkan warna cokelat. Teknik memasaknya juga membutuhkan waktu berjam-jam sehingga masakan begitu meresap. Gudeg biasanya disajikan dengan sayur krecek, telur bacem, tahu, ayam kampung dan santan kental.\r\n\r\nRawon\r\n\r\nSalah satu makanan khas Jawa Timur yang paling terkenal, yaitu Rawon. Makanan ini identik dengan kuah hitamnya. Ciri khas warna hitam pada rawon berasal dari kluwek. Makanan khas Jawa Timur ini nikmat disantap dengan nasi putih, kerupuk, serta lauk pelengkap seperti telur asin.\r\n\r\nTongseng\r\n\r\nTongseng merupakan makanan tradisional Indonesia asal Jawa Tengah. Tongseng dibuat dengan menggunakan daging yang masih melekat pada tulang, terutama tulang iga dan tulang belakang. Tongseng pada umumnya menggunakan daging kambing, meskipun ada pula tongseng daging sapi dan kerbau. Tongseng juga biasanya diberi tambahan sayuran seperti kol, bawang putih, tomat, dan kecap.\r\n\r\nRujak Cingur\r\n\r\nMakanan khas Jawa ini berasal dari kota Surabaya. Cingur adalah bagian daging mulut sapi yang direbus, lalu dicampur dengan irisan tempe, tahu, timun, nanas, lontong, sayuran, bumbu kacang serta petis. Meski bagi beberapa orang menu ini sukup ekstrem, namun jangan salah, makanan khas Jawa Timur ini sangat nikmat dan bikin ketagihan.\r\n\r\nNasi Gandul\r\n\r\nMakanan khas Jawa selanjutnya berasal dari Pati, yaitu Nasi gandul. Nasi yang disajikan di daun pisang dengan lauk daging sapi disiram kuah segar. Dijamin bikin kamu ketagihan. Sajian kuliner ini juga sudah cukup terkenal. Hal ini dikarenakan Nasi Gandul memiliki cita rasa yang unik.\r\n\r\nAdanya rasa gurih yang begitu kental hadir dalam setiap bulir nasinya. Gurihnya nasi ini dikarenakan dalam memasaknya menggunakan daun pandan. Selain bikin gurih, juga membuat nasi menjadi lebih wangi.\r\n\r\nNasi Gandul disajikan dengan aneka lauk seperti daging sapi yang sudah diolah, telur, dan disiram dengan kuah pedas yang makin menambah selera.\r\n\r\nNasi Liwet\r\n\r\nNasi Liwet merupakan makanan khas Solo. Sekilas makanan khas Jawa Tengah ini mirip dengan nasi gurih atau nasi uduk. Nasi liwet adalah nai yang dimasak dengan santan kelapa sehingga mendapatkan rasa gurih. Nasi liwet disajikan bersama sayur labu siam dan suwiran ayam gurih.', 'IMG-63876c17b67903.89490730.png', 'DELETED', 0),
('Messi Sering Menginap di Hotel Shikifujina', '2022-11-30 16:55:36', 'Lionel Andres Messi lahir pada 24 Juni 1987. Ia biasa dikenal sebagai Leo Messi. Ia adalah pemain sepak bola profesional Argentina yang bermain sebagai penyerang untuk klub Ligue 1, Paris Saint -Germain dan kapten tim nasional Argentina.\r\n\r\nSering dianggap sebagai pemain terbaik di dunia dan secara luas dianggap sebagai salah satu pemain terhebat sepanjang masa, Messi telah memenangkan rekor tujuh penghargaan Ballon d\'Or.\r\n\r\nKARIR KLUB\r\n\r\nBarcelona (2003 – 2021)\r\n\r\nPada usia 16 tahun, empat bulan, dan 23 hari, Messi melakukan debut tim pertamanya ketika ia masuk pada menit ke-75 dalam pertandingan persahabatan melawan Porto asuhan Jose Mourinho pada 16 November 2003.\r\n\r\nUntuk mendapatkan pengalaman pertandingan lebih lanjut, Messi bergabung dengan Barcelona C selain Juveniles A, memainkan pertandingan pertamanya untuk tim ketiga pada 29 November. Dia membantu menyelamatkan mereka dari zona degradasi Divisi Tercera.\r\n\r\nSelama musim 2004-05, Messi adalah starter dijamin untuk tim B, bermain 17 pertandingan sepanjang kampanye dan mencetak gol pada enam kesempatan.\r\n\r\nSaat Messi mempertahankan performa mencetak golnya di paruh kedua musim, tahun 2012 dia memecahkan beberapa rekor lama. Pada tanggal 7 Maret, dua minggu setelah mencetak empat gol dalam pertandingan liga melawan Valencia, ia mencetak lima gol dalam pertandingan babak 16 besar Liga Champions melawan Bayer Leverkusen, pencapaian yang belum pernah terjadi sebelumnya dalam sejarah kompetisi.\r\n\r\nDengan kepergian mantan kapten Andres Iniesta pada Mei 2018, Messi diangkat sebagai kapten baru tim untuk musim berikutnya. Pada 12 Agustus 2018, ia mengangkat gelar pertamanya sebagai kapten Barcelona, Supercopa de Espaa, menyusul kemenangan 2-1 atas Sevilla.\r\n\r\nPada tanggal 1 Juli 2021, Messi menjadi agen bebas setelah kontraknya berakhir, dengan negosiasi kesepakatan baru yang rumit karena masalah keuangan di Barcelona. Pada tanggal 5 Agustus, Barcelona mengumumkan bahwa Messi tidak akan tinggal di klub, meskipun kedua belah pihak mencapai kesepakatan dan akan menandatangani kontrak hari itu. Klub mengutip kendala keuangan dan struktural yang ditimbulkan oleh peraturan La Liga lah yang menjadi alasan kepergian Messi.\r\n\r\nPSG (2021 – Sekarang)\r\n\r\nPada 10 Agustus, Messi bergabung dengan klub Prancis Paris Saint-Germain. Dia menandatangani kontrak dua tahun hingga Juni 2023 dengan opsi perpanjangan satu tahun. Messi memilih 30 sebagai nomor skuatnya, sama seperti yang ia kenakan saat remaja saat melakukan debut seniornya untuk Barcelona.\r\n\r\nMessi melakukan debutnya untuk klub pada 29 Agustus, masuk sebagai pemain pengganti di babak kedua saat menang 2-0 atas Reims di Ligue 1.\r\n\r\nSetelah mencetak 40 gol di level klub dan internasional untuk tahun kalender dan membantu Argentina memenangkan Copa America 2021, Messi menerima rekor Ballon d\'Or ketujuh pada 29 November.\r\n\r\nKARIR INTERNASIONAL', 'IMG-63872898644a91.67715005.jpg', 'DELETED', 1),
('Nasi Goreng Khas Hotel Shikifujin', '2022-12-05 06:04:28', '<p>Nasi goreng merupakan makanan khas Indonesia, dan pada dasarnya sama seperti makanan Indonesia lainnya yang memiliki banyak sekali variasi. Meski sudah ada berbagai macam variasi, pada dasarnya nasi goreng adalah nasi yang digoreng yang kemudian ditambahi dengan berbagai bumbu untuk kenikmatan yang lebih lagi.</p>\r\n\r\n<p>Selain itu, masing-masing resep memiliki ciri khas tersendiri. Kamu bisa kok mencoba satu atau mungkin semua variasi nasi goreng yang ada. Bahan-bahannya juga mudah didapatkan.</p>\r\n\r\n<p>Berikut ini IDN Times akan kasih kamu beberapa aneka resep nasi goreng yang enak dan cara membuatnya yang bisa kamu coba sendiri lho.</p>\r\n\r\n<h1>Nasi Goreng Sederhana</h1>\r\n\r\n<p>Bahan :</p>\r\n\r\n<ul>\r\n	<li>Nasi putih 1 piring</li>\r\n	<li>Bawang putih 2 siung, cincang halus</li>\r\n	<li>Kecap manis atau kecap asin sesuai selera</li>\r\n	<li>Saus sambal sesuai selera</li>\r\n	<li>Saus tiram sesuai selera</li>\r\n	<li>Garam secukupnya</li>\r\n	<li>Kaldu bubuk rasa ayam atau sapi sesuai selera</li>\r\n	<li>Daun bawang 1 batang, cincang halus</li>\r\n	<li>Telur ayam 1 butir</li>\r\n	<li>Sosis ayam 1 buah, iris tipis</li>\r\n	<li>Margarin atau minyak goreng 3 sdm</li>\r\n</ul>\r\n\r\n<p>Cara Membuat :</p>\r\n\r\n<ol>\r\n	<li>Siapkan penggorengan dengan api sedang, tuang margarin atau minyak goreng.</li>\r\n	<li>Masukkan bawang putih dan daun bawang yang sudah dicincang halus. Tumis hingga berbau harum atau hingga warnanya keemasan.</li>\r\n	<li>Masukkan sosis dan 1 butir telur ayam. Tumis sebentar.</li>\r\n	<li>Masukkan bumbu halus dan nasi. Aduk hingga tercampur rata.</li>\r\n	<li>Tuang kecap manis, saus sambal, saus tiram, garam, dan kaldu bubuk. Aduk hingga warna nasi berubah secara merata.</li>\r\n	<li>Nasi goreng biasa yang sederhana, dan enak siap disajikan.</li>\r\n</ol>\r\n', 'IMG-638d277c0ea738.44701903.jpg', 'ACTIVE', 985),
('Tester', '2022-12-12 10:00:21', '<p>asd</p>\r\n', 'IMG-63969945554302.84684354.jpg', 'DELETED', 0),
('testeras', '2022-12-12 10:17:26', '<p>asd</p>\r\n', 'IMG-63969d465daa94.33239045.jpg', 'DELETED', 0),
('Using Kali Linux for Gaining Access (windows machine)', '2022-12-05 22:53:12', '<p>Step1: check your IP address (Linux machine) where yo going is not found until i won</p>\r\n\r\n<p><img alt=\"\" src=\"https://miro.medium.com/max/1100/0*4G_6R5DYQ9S99CD-\" style=\"height:281px; width:500px\" /></p>\r\n\r\n<p>Step 2: check the number of machines inside the network</p>\r\n\r\n<p><img alt=\"\" src=\"https://miro.medium.com/max/1100/0*vj06pF0ghYJCI8xM\" style=\"width:500px\" /></p>\r\n\r\n<p>Command:&nbsp;<strong>Netdiscover &ndash;r 192.168.243.0/24</strong></p>\r\n\r\n<p>Out of these IP addresses we have :</p>\r\n\r\n<p>n/w IP</p>\r\n\r\n<p>default gateway</p>\r\n\r\n<p>broadcast IP</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>And one IP address that we need to check (<strong>192.168.243.131)</strong></p>\r\n\r\n<p>now check whether host is live or not.</p>\r\n\r\n<p>ping command:&nbsp;<strong>Ping 192.168.243.131</strong></p>\r\n\r\n<p><img alt=\"\" src=\"https://miro.medium.com/max/1100/0*4z1vJwheFz6yU7tQ\" style=\"height:281px; width:500px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Host is up as we are getting the ping response.</p>\r\n\r\n<p>Now we will use nmap command to get the information regarding:</p>\r\n\r\n<p>Open ports</p>\r\n\r\n<p>Services running</p>\r\n\r\n<p>Version of services</p>\r\n\r\n<p>Operating system details</p>\r\n\r\n<p>For this, we will use aggressive nmap</p>\r\n\r\n<p>Command.&nbsp;<strong>Nmap &ndash;A 192.168.243.131 (IP target address)</strong></p>\r\n\r\n<p><img alt=\"\" src=\"https://miro.medium.com/max/1100/0*Zm_tkvibo_JGCwnL\" style=\"width:500px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>in this :we get the following details</p>\r\n\r\n<p>PORT STATE SERVICE VERSION</p>\r\n\r\n<p>135/tcp open msrpc Microsoft Windows RPC</p>\r\n\r\n<p>139/tcp open netbios-ssn</p>\r\n\r\n<p>445/tcp open microsoft-ds Microsoft Windows XP microsoft-ds</p>\r\n\r\n<p>MAC Address: 00:0C:29:DB:DA:8A (VMware)</p>\r\n\r\n<p>Operating details: Microsoft Windows XP Professional SP2</p>\r\n\r\n<p>Now since we got the details of the operating system we can search for the exploit for the particular operating system.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'IMG-638e13e873d860.80287223.png', 'DELETED', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_view`
--

CREATE TABLE `blog_view` (
  `id` int NOT NULL,
  `judul` text NOT NULL,
  `user_ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blog_view`
--

INSERT INTO `blog_view` (`id`, `judul`, `user_ip`) VALUES
(1, 'Kajian Rutin di Hotel Shikifujin', '::1'),
(2, 'Harta Karun One Piece Ditemukan Di Shikifujin Hotel', '::1'),
(3, 'Belajar Budaya Jepang di Shikifujin Hotel', '::1'),
(4, 'Diskon Khusus Wibu Yang Berkunjung Ke Shikifujin Hotel', '::1'),
(5, 'Makanan Gratis Tiap Jumat Di Hotel Shikifujin', '::1'),
(6, 'Messi Sering Menginap di Hotel Shikifujina', '::1'),
(7, 'Tutorial Membuat Nasi Goreng', '::1'),
(8, 'Using Kali Linux for Gaining Access (windows machine)', '::1'),
(9, 'Nasi Goreng Khas Hotel Shikifujin', '::1'),
(10, 'Belajar Budaya Jepang di Hotel Shikifujin', '::1'),
(11, 'Nasi Goreng Khas Hotel Shikifujin', '112.215.241.75'),
(12, 'Harta Karun One Piece Ditemukan Di Shikifujin Hotel', '112.215.241.75'),
(13, 'Makanan Gratis Tiap Jumat Di Hotel Shikifujin', '112.215.241.75'),
(14, 'Nasi Goreng Khas Hotel Shikifujin', '103.124.137.251'),
(15, 'Makanan Gratis Tiap Jumat Di Hotel Shikifujin', '103.124.137.251'),
(16, 'Nasi Goreng Khas Hotel Shikifujin', '114.10.5.241'),
(17, 'Kajian Rutin di Hotel Shikifujin', '114.10.5.241'),
(18, 'Belajar Budaya Jepang di Hotel Shikifujin', '140.213.56.35'),
(19, 'Makanan Gratis Tiap Jumat Di Hotel Shikifujin', '140.213.56.35'),
(20, 'Nasi Goreng Khas Hotel Shikifujin', '140.213.56.35'),
(21, 'Makanan Gratis Tiap Jumat Di Hotel Shikifujin', '103.226.174.22'),
(22, 'Harta Karun One Piece Ditemukan Di Shikifujin Hotel', '103.226.174.22'),
(23, 'Nasi Goreng Khas Hotel Shikifujin', '202.80.214.171'),
(24, 'Kajian Rutin di Hotel Shikifujin', '202.80.214.171'),
(25, 'Nasi Goreng Khas Hotel Shikifujin', '114.10.18.88'),
(26, 'Kajian Rutin di Hotel Shikifujin', '114.10.18.88'),
(27, 'Nasi Goreng Khas Hotel Shikifujin', '139.0.39.44'),
(28, 'Nasi Goreng Khas Hotel Shikifujin', '203.6.149.2'),
(29, 'Ashiappp', '203.6.149.2'),
(30, 'Nasi Goreng Khas Hotel Shikifujin', '36.72.213.237');

-- --------------------------------------------------------

--
-- Table structure for table `booking_room`
--

CREATE TABLE `booking_room` (
  `booking_id` int NOT NULL,
  `user_id` int NOT NULL,
  `room_id` int NOT NULL,
  `adult` int NOT NULL,
  `kid` int NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `total_price` int NOT NULL,
  `special_request` text NOT NULL,
  `booking_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Waiting for payment'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking_room`
--

INSERT INTO `booking_room` (`booking_id`, `user_id`, `room_id`, `adult`, `kid`, `check_in`, `check_out`, `total_price`, `special_request`, `booking_date`, `status`) VALUES
(1, 3, 1, 1, 1, '2022-11-18', '2022-11-20', 5000000, '', '2022-11-17 00:00:00', 'Success'),
(2, 3, 1, 4, 4, '2022-11-19', '2022-11-20', 200000, '', '2022-11-18 00:00:00', 'Success'),
(6, 3, 1, 2, 3, '2022-11-28', '2022-11-30', 0, '', '2022-11-27 00:00:00', 'Success'),
(7, 3, 1, 1, 2, '2022-11-29', '2022-11-30', 0, '', '2022-11-28 00:00:00', 'Success'),
(8, 53, 1, 1, 0, '2022-12-12', '2022-12-14', 0, '', '2022-12-12 00:00:00', 'Success'),
(9, 53, 1, 1, 0, '2022-12-12', '2022-12-14', 0, '', '2022-12-12 00:00:00', 'Success'),
(10, 53, 1, 1, 0, '2022-12-12', '2022-12-13', 0, '', '2022-12-12 00:00:00', 'Success'),
(11, 53, 1, 1, 0, '2022-12-14', '2022-12-15', 0, '', '0000-00-00 00:00:00', 'Success'),
(12, 53, 1, 1, 0, '2022-12-13', '2022-12-15', 0, '', '0000-00-00 00:00:00', 'Success'),
(13, 55, 1, 1, 0, '2022-12-21', '2022-12-23', 1000000, '', '0000-00-00 00:00:00', 'Success'),
(14, 55, 1, 1, 0, '2022-12-15', '2022-12-16', 1000000, '', '0000-00-00 00:00:00', 'Success'),
(15, 55, 1, 1, 0, '2022-12-14', '2022-12-17', 1000000, '', '0000-00-00 00:00:00', 'Success'),
(16, 55, 2, 1, 0, '2022-12-14', '2022-12-17', 500000, '', '0000-00-00 00:00:00', 'Success'),
(17, 55, 2, 1, 0, '2022-12-14', '2022-12-17', 500000, '', '0000-00-00 00:00:00', 'Success'),
(18, 55, 2, 1, 0, '2022-12-16', '2022-12-23', 3500000, '', '2022-12-16 03:12:05', 'Success'),
(19, 55, 2, 1, 0, '2022-12-19', '2022-12-21', 1000000, '', '2022-12-18 08:12:17', 'Success'),
(20, 55, 2, 1, 0, '2022-12-18', '2022-12-20', 1000000, '', '2022-12-18 04:12:32', 'Success'),
(21, 64, 2, 1, 0, '2022-12-18', '2022-12-22', 2000000, '', '2022-12-18 03:12:57', 'Using room'),
(22, 64, 2, 1, 0, '2022-12-18', '2022-12-20', 1000000, '', '2022-12-18 10:12:51', 'Success'),
(23, 26, 2, 1, 2, '2022-12-20', '2022-12-21', 500000, '', '2022-12-19 09:12:33', 'Waiting for payment'),
(24, 78, 2, 1, 0, '2022-12-22', '2022-12-23', 500000, '', '2022-12-19 10:12:43', 'Booking success'),
(25, 78, 2, 1, 0, '2022-12-19', '2022-12-27', 4000000, '', '2022-12-19 10:12:24', 'Using room'),
(26, 64, 3, 1, 0, '2022-12-19', '2022-12-20', 1000000, '', '2022-12-19 05:12:23', 'Success'),
(27, 64, 3, 1, 0, '2022-12-20', '2022-12-21', 1000000, '', '2022-12-20 05:12:45', 'Cancelled'),
(28, 63, 3, 2, 3, '2022-12-21', '2022-12-23', 2000000, '', '2022-12-21 03:12:44', 'Using room');

-- --------------------------------------------------------

--
-- Table structure for table `cancelled`
--

CREATE TABLE `cancelled` (
  `cancel_id` int NOT NULL,
  `booking_id` int NOT NULL,
  `cancel_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int NOT NULL,
  `booking_id` int NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `booking_id`, `payment_method`, `payment_date`) VALUES
(1, 13, 'Check', '0000-00-00 00:00:00'),
(2, 14, 'Check', '0000-00-00 00:00:00'),
(3, 15, 'Paypall', '0000-00-00 00:00:00'),
(4, 16, 'Check', '2022-12-15 04:12:38'),
(5, 17, 'Credit Card', '2022-12-15 04:12:02'),
(6, 20, 'Check', '2022-12-18 04:12:34'),
(7, 21, 'Check', '2022-12-18 03:12:19'),
(8, 22, 'Paypall', '2022-12-18 10:12:11'),
(9, 24, 'Paypall', '2022-12-19 10:12:58'),
(10, 25, 'Paypall', '2022-12-19 10:12:37'),
(11, 26, 'Credit Card', '2022-12-19 05:12:08'),
(12, 28, 'Check', '2022-12-21 03:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `quantity` int NOT NULL,
  `adult` int NOT NULL,
  `child` int NOT NULL,
  `price` int NOT NULL,
  `feature` varchar(255) NOT NULL,
  `facilities` varchar(100) NOT NULL,
  `room_description` text NOT NULL,
  `room_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_name`, `quantity`, `adult`, `child`, `price`, `feature`, `facilities`, `room_description`, `room_photo`) VALUES
(1, 'Mevvah', 0, 2, 3, 1000000, '2 Rooms 1 Bathroom 1 Balcony 3 Sofa', 'Wifi Television AC Room Heater OK', 'Double view (corner room)', '1.jpg'),
(2, 'Sedang', 0, 2, 2, 500000, '1 Rooms 1 Bathroom 2 Sofa', 'Wifi Television AC ', 'Normal view', '1.jpg'),
(3, 'Mewah', 3, 2, 3, 1000000, '2 Rooms 1 Bathroom 1 Balcony 3 Sofa', 'Wifi Television AC Room Heater', 'Double view (corner room)', '1.jpg'),
(4, 'Mewah', 7, 5, 3, 1000000, '2 Rooms 1 Bathroom 1 Balcony 3 Sofa', 'Wifi Television AC Room Heater', 'Double view (corner room)', '1.jpg'),
(5, 'Mewah', 7, 2, 1, 1000000, '2 Rooms 1 Bathroom 1 Balcony 3 Sofa', 'Wifi Television AC Room Heater', 'Double view (corner room)', '1.jpg'),
(6, 'Mewah', 7, 6, 6, 1000000, '2 Rooms 1 Bathroom 1 Balcony 3 Sofa', 'Wifi Television AC Room Heater', 'Double view (corner room)', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `room_facilities`
--

CREATE TABLE `room_facilities` (
  `room_id` int NOT NULL,
  `facilities_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_aut`
--

CREATE TABLE `user_aut` (
  `id` int NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_aut`
--

INSERT INTO `user_aut` (`id`, `user_email`, `pertanyaan`, `jawaban`) VALUES
(29, 'mabil@emac', 'your favorite movie title ? ', 'messi'),
(30, 'reza@email.comxasd', 'your pet', 'dimas rama'),
(31, 'nabil@email.comasd', 'your idol artist ?', 'kim jong un'),
(32, 'asd21@asd', 'favorite anime ?', 'one piece'),
(33, 'samidi@email.com', 'favorite anime ?', 'naruto'),
(34, 'budi@budi.com', 'what is your favorite food ? ', 'nasgor');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `user_id` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `photo_profile` text NOT NULL,
  `negara` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `password` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`user_id`, `nama`, `user_email`, `phone_number`, `photo_profile`, `negara`, `alamat`, `tanggal_lahir`, `password`, `status`) VALUES
(24, 'nabil makanr', 'nabil@email.comasd', '912839', 'default_profile.png', 'INDONESIA', 'KEPULAUAN RIAU-KABUPATEN BINTAN-BINTAN PESISIR-AIR GLUBI', '2022-11-29', '33f491ca539b364cba9c1814c2639d46', 'ACTIVE'),
(25, 'dimas rama', 'reza@email.comxasd', '12312', 'default_profile.png', 'INDONESIA', 'JAWA TENGAH-KOTA SURAKARTA-BANJARSARI-BANYUANYAR', '2022-11-29', '33f491ca539b364cba9c1814c2639d46', 'ACTIVE'),
(26, 'nabil', 'mabil@emac', '2131923', 'default_profile.png', 'INDONESIA', 'KEPULAUAN RIAU-KABUPATEN BINTAN-BINTAN PESISIR-AIR GLUBI', '2022-11-29', '33f491ca539b364cba9c1814c2639d46', 'ACTIVE'),
(31, 'gaplek', 'reza@email.caomasd', '213123', 'default_profile.png', 'INDONESIA', 'KEPULAUAN BANGKA BELITUNG-KABUPATEN BANGKA-BAKAM-BAKAM', '2022-11-28', '33f491ca539b364cba9c1814c2639d46', 'ACTIVE'),
(32, 'Pamuji', 'asd21@asd', '087772131239', 'default_profile.png', 'INDONESIA', 'LAMPUNG-KABUPATEN LAMPUNG BARAT-AIR HITAM-GUNUNG TERANG', '1994-05-10', '33f491ca539b364cba9c1814c2639d46', 'ACTIVE'),
(38, 'Samidi', 'rezaasd@ads', '12321', 'IMG-638c6242ea3402.27565759.png', 'INDONESIA', 'ACEH BARAT-KABUPATEN LAMPUNG BARAT-AIR HITAM-GUNUNG TERANG', '1999-10-07', '33f491ca539b364cba9c1814c2639d46', 'ACTIVE'),
(40, 'nabil', 'rezasad@sadsad', '2139213', 'IMG-638c627e8b3311.42533784.png', 'malaysia', 'batam-upin-ipin-opon', '2022-11-29', '33f491ca539b364cba9c1814c2639d46', 'ACTIVE'),
(42, 'rizkyAkbar', 'rizky@email.com', '129301293', 'IMG-638c6bd5036312.62272621.png', 'INDONESIA', 'JAWA TENGAH-KOTA SURAKARTA-SERENGAN-JAYENGAN', '1998-06-04', '33f491ca539b364cba9c1814c2639d46', 'ACTIVE'),
(44, 'Brian', 'brian@email.com', '81921839', 'IMG-638c75b234e585.90666351.png', 'INDONESIA', 'JAWA TENGAH-KABUPATEN KARANGANYAR-JUMAPOLO-PASEBAN', '2000-10-11', '33f491ca539b364cba9c1814c2639d46', 'ACTIVE'),
(46, 'adit', 'adit@ads', '213213', 'default_profile.png', 'asdas', 'sadas-asd-sadas-asd', '1998-12-28', '33f491ca539b364cba9c1814c2639d46', 'DELETED'),
(47, 'El Shadday Krisna', 'krisna@email.com', '082102091309', 'IMG-638e0ef11b0ae6.29703320.jpg', 'INDONESIA', 'JAWA TENGAH-KABUPATEN WONOGIRI-SELOGIRI-NAMBANGAN', '2002-05-13', '33f491ca539b364cba9c1814c2639d46', 'ACTIVE'),
(49, 'adit', 'adit@emasdl', '087737224572', 'IMG-638e1137c63419.15297989.png', 'INDONESIA', 'KEPULAUAN BANGKA BELITUNG-KABUPATEN BANGKA-BAKAM-BAKAM', '2003-05-21', '33f491ca539b364cba9c1814c2639d46', 'ACTIVE'),
(51, 'asakdj', 'reza@ads21312', '903821039', 'IMG-638e163e99e7d2.28529811.png', 'INDONESIA', 'KEPULAUAN BANGKA BELITUNG-KABUPATEN BANGKA-BAKAM-BAKAM', '2022-11-27', '33f491ca539b364cba9c1814c2639d46', 'ACTIVE'),
(53, 'Dewi', 'Dewi@email.com', '0812736123878', 'default_profile.png', 'INDONESIA', 'KALIMANTAN UTARA-KABUPATEN BULUNGAN-BUNYU-BUNYU BARAT', '1997-03-11', 'e191b3dfe7a6e3c6fe24bbbbf3635849', 'ACTIVE'),
(54, 'Sarimi', 'sari@email.com', '57238912839', 'default_profile.png', 'INDONESIA', 'KEPULAUAN RIAU-KABUPATEN BINTAN-BINTAN PESISIR-AIR GLUBI', '1992-09-28', '2f358877059d463ff92e537376911ed0', 'ACTIVE'),
(55, 'Salsabila', 'salsa@email.cd', '08127871283', 'default_profile.png', 'INDONESIA', 'SUMATERA SELATAN-KABUPATEN BANYU ASIN-AIR KUMBANG-AIR KUMDANG BHAKTI', '1988-01-11', '80a1453d878d2e37a66fe6e22b2b35e0', 'ACTIVE'),
(56, 'Hasna', 'hasna@dm', '02139128213', 'default_profile.png', 'INDONESIA', 'JAWA TENGAH-KABUPATEN BANJARNEGARA-BANJARMANGU-BANJARKULON', '2000-06-06', '9f9f8f0565d82196329e2448bfedeb05', 'ACTIVE'),
(57, 'Samiri', 'samiri@email.com', '0123981293', 'default_profile.png', 'BRUNEI', 'SAMAI-TAPIE-GANULIT-RAPEK', '2000-06-11', '039b9b615efc120f27f37a9e2ce71698', 'ACTIVE'),
(62, 'Samidi', 'samidi@email.com', '09218391238', 'default_profile.png', 'INDONESIA', 'LAMPUNG-KABUPATEN LAMPUNG BARAT-AIR HITAM-GUNUNG TERANG', '2000-02-02', '33f491ca539b364cba9c1814c2639d46', 'ACTIVE'),
(63, 'Dimas Rama Wijaya', 'dimasrw@gmail.com', '089673832726', 'default_profile.png', 'INDONESIA', 'JAWA TENGAH-KOTA SURAKARTA-BANJARSARI-KADIPIRO', '2003-06-23', '1b8389a2819ad73685a36eba8136cf5c', 'ACTIVE'),
(64, 'admin', 'admin@mail.com', '123', 'default_profile.png', 'INDONESIA', 'DI YOGYAKARTA-KABUPATEN BANTUL-BAMBANG LIPURO-MULYODADI', '2000-12-12', 'd45c37349625476bbb3712340c916c95', 'ACTIVE'),
(65, 'Nabil Makarim', 'poconk036@gmail.com', '085602807176', 'IMG-639b215a8c7b47.42365921.png', 'INDONESIA', 'JAWA TENGAH-KABUPATEN SUKOHARJO-GROGOL-CEMANI', '2002-12-04', '47fbf7b6c97b2a55bc449daddf7308ca', 'ACTIVE'),
(70, 'Nabil Makarim', 'kiddoes56@gmail.com', '99134649', 'IMG-639b24765df9a0.64391139.jpg', 'INDONESIA', 'GORONTALO-KABUPATEN BOALEMO-BOTUMOITO-RUMBIA', '1996-12-15', 'cc05b6b68f502d3c88d3580e82285cf0', 'ACTIVE'),
(72, 'Renz', 'renz@gmail.com', '085763746387', 'default_profile.png', 'INDONESIA', 'GORONTALO-KOTA GORONTALO-DUMBO RAYA-BOTU', '2022-12-12', '7e63ce504f0a15e405743245e97c8e5b', 'ACTIVE'),
(74, 'Nabil Makarim', 'poconk12@gmail.com', '085738598693', 'default_profile.png', 'INDONESIA', 'BENGKULU-KABUPATEN BENGKULU SELATAN-AIR NIPIS-KEBAN JATI', '2022-11-27', '585424565ca4b67fad757c4f9d5a21a1', 'ACTIVE'),
(76, 'pangestu', 'pangestu@email.com', '08129381293', 'default_profile.png', 'INDONESIA', 'SULAWESI TENGGARA-KOTA KENDARI-KENDARI-KENDARI CADDI', '2002-06-03', '33f491ca539b364cba9c1814c2639d46', 'ACTIVE'),
(77, 'Pakubuwono x', 'kratondiy1@gmail.com', '123456654321', 'default_profile.png', 'INDONESIA', 'DI YOGYAKARTA-KOTA YOGYAKARTA-PAKUALAMAN-PURWO KINANTI', '1817-12-18', 'c459b588f53832f831c2d83a6f01e2b8', 'ACTIVE'),
(78, 'cucuk', 'budi@budi.com', '21312', 'IMG-639fd863ed7df5.14756773.jpg', 'INDONESIA', 'KALIMANTAN TENGAH-KABUPATEN BARITO SELATAN-DUSUN HILIR-BATAMPANG', '2022-12-01', '3f70d3a077113925792edee68eda35c8', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `user_message`
--

CREATE TABLE `user_message` (
  `message_id` int NOT NULL,
  `user_id` int NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT 'UNREAD'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_message`
--

INSERT INTO `user_message` (`message_id`, `user_id`, `subject`, `message`, `date_post`, `status`) VALUES
(5, 1, 'Kritik Hotel', 'pelayanan hotel di shikifujin sangatlah bagus', '2022-12-02 13:27:53', 'DELETED'),
(6, 1, 'wkwk', 'wkwkkww', '2022-12-02 13:27:53', 'DELETED'),
(7, 1, 'ya begitulah', 'santai', '2022-12-02 13:27:53', 'DELETED'),
(8, 2, 'sadksajd', 'kasdkmasd', '2022-12-02 13:27:53', 'READED'),
(9, 2, 'asdjkasd', 'iasdiasd', '2022-12-02 13:27:53', 'READED'),
(10, 8, 'asidj', 'iasjdisa', '2022-12-02 13:27:53', 'READED'),
(11, 8, 'iasjds', 'askdoask', '2022-12-02 13:27:53', 'READED'),
(12, 14, 'aksdjkad', 'sajdasjdasd', '2022-12-02 13:27:53', 'READED'),
(13, 14, 'asijdiasdj', 'asjdoasjidjasd', '2022-12-02 13:27:53', 'READED'),
(14, 15, 'asjdadsj', 'iasjdiasjdia', '2022-12-02 13:27:53', 'READED'),
(15, 15, 'asjdasjiasd', 'sajnasdasid', '2022-12-02 13:27:53', 'READED'),
(16, 16, 'sakdjaskd', 'asidjiasjdiasd', '2022-12-02 13:27:53', 'READED'),
(17, 16, 'ajsdsa', 'asdasodjoasd', '2022-12-02 13:27:53', 'READED'),
(18, 8, 'yasudah', 'kenapa hotelnya bau', '2022-12-02 13:27:53', 'READED'),
(19, 14, 'ya begitulah', 'waduh dek', '2022-12-02 13:27:53', 'READED'),
(20, 9, 'waduhe', 'ceking', '2022-12-02 13:27:53', 'READED'),
(21, 9, 'samala', 'sadasd', '2022-12-02 13:32:44', 'READED'),
(22, 9, 'walilah', 'walala', '2022-12-02 13:49:54', 'READED'),
(23, 49, 'sampah', 'kenapa tidak ada tempat sampah ?', '2022-12-05 22:44:12', 'READED'),
(24, 49, 'apalah', 'ya begitulah', '2022-12-05 22:46:30', 'READED'),
(25, 63, 'Where is ronaldo', 'Portugal airport is that way', '2022-12-15 20:50:01', 'READED'),
(26, 78, 'Ok', 'Ok....', '2022-12-19 10:20:39', 'READED');

-- --------------------------------------------------------

--
-- Table structure for table `user_rating`
--

CREATE TABLE `user_rating` (
  `rating_id` int NOT NULL,
  `booking_id` int NOT NULL,
  `rating` int NOT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_rating`
--

INSERT INTO `user_rating` (`rating_id`, `booking_id`, `rating`, `review`) VALUES
(1, 19, 5, 'waw'),
(2, 18, 4, 'Nice');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`judul`);

--
-- Indexes for table `blog_view`
--
ALTER TABLE `blog_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_room`
--
ALTER TABLE `booking_room`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `user_aut`
--
ALTER TABLE `user_aut`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`user_email`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `user_message`
--
ALTER TABLE `user_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `user_rating`
--
ALTER TABLE `user_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_view`
--
ALTER TABLE `blog_view`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `booking_room`
--
ALTER TABLE `booking_room`
  MODIFY `booking_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_aut`
--
ALTER TABLE `user_aut`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `user_message`
--
ALTER TABLE `user_message`
  MODIFY `message_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_rating`
--
ALTER TABLE `user_rating`
  MODIFY `rating_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
