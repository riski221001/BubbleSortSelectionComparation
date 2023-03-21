<html>
<head>
	<title>Bubble Sort</title>
</head>
<body>
	<h1>Bubble Sort</h1>
	<form method="post">
		<label>Masukkan panjang array:</label><br>
		<input type="number" name="length" required><br>
		<label>Masukkan elemen array (pisahkan dengan koma):</label><br>
		<input type="text" name="elements" required><br>
		<input type="submit" value="Submit">
	</form>
	<?php
		if($_POST){
			$length = $_POST['length'];
			$elements = explode(',', $_POST['elements']);
			if(count($elements) != $length){
				echo "Panjang array tidak sesuai dengan jumlah elemen yang diinput.";
			} else {
				echo "Elemen yang dimasukkan : [".implode(',', $elements)."]<br>";
				echo "<br>";
				$time_start = microtime(true); // waktu awal
				echo "Proses sorting dengan metode bubble sort : <br>";
				function bubbleSort($arr){
					$length = count($arr);
					$counter = 0;
					for($i=0; $i<$length; $i++){
						for($j=$i+1; $j<$length; $j++){
							$counter++;
							echo "Iterasi ke-".$counter.": ";
							if($arr[$i] > $arr[$j]){
								$temp = $arr[$i];
								$arr[$i] = $arr[$j];
								$arr[$j] = $temp;
							}
							echo "[".implode(',', $arr)."]<br>";
						}
					}
					return $arr;
				}
        $time_end = microtime(true); // waktu akhir
        $time = $time_end - $time_start; // selisih waktu awal dan akhir
				$sortedArray = bubbleSort($elements);
				echo "<br>Array setelah diurutkan: [".implode(',', $sortedArray)."]";
        echo "<br>Waktu yang dibutuhkan: ".number_format($time, 8)." detik";
		
			}
		}
	?>
</body>
</html>

<form action="index.php" method="post">
  <input type="button" value="Kembali ke Menu Awal" onclick="location.href='index.php'">
</form>

</body>
</html>