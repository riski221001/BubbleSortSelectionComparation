<!DOCTYPE html>
<html>
<head>
  <title>Perbandingan Kompleksitas Waktu Bubble Sort dan Insertion Sort</title>
  <!-- menyertakan Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
</head>
<body>
  <h1>Perbandingan Kompleksitas Waktu Bubble Sort dan Insertion Sort</h1>
  <form>
    <label for="data_size">Masukkan ukuran data:</label><br>
    <input type="number" id="data_size" name="data_size"><br>
    <input type="submit" value="Submit">
  </form> 
  <br>
  <!-- tempat menampilkan hasil perbandingan -->
  <div id="results"></div>
  <!-- tempat menampilkan grafik -->
  <canvas id="myChart"></canvas>
  
  <script>
    // fungsi untuk menghitung waktu eksekusi bubble sort
    function bubbleSort(arr) {
      var start = performance.now();
      // kode untuk melakukan bubble sort di sini
      for (var i = 0; i < arr.length; i++) {
        for (var j = 0; j < arr.length - i - 1; j++) {
          if (arr[j] > arr[j + 1]) {
            var temp = arr[j];
            arr[j] = arr[j + 1];
            arr[j + 1] = temp;
          }
        }
      }
      var end = performance.now();
      return end - start;
    }
    
    // fungsi untuk menghitung waktu eksekusi insertion sort
    function insertionSort(arr) {
      var start = performance.now();
      // kode untuk melakukan insertion sort di sini
      for (var i = 1; i < arr.length; i++) {
        var key = arr[i];
        var j = i - 1;
        while (j >= 0 && arr[j] > key) {
          arr[j + 1] = arr[j];
          j--;
        }
        arr[j + 1] = key;
      }
      var end = performance.now();
      return end - start;
    }
    
        // fungsi untuk mengambil input dari form dan menampilkan grafik perbandingan waktu eksekusi
        function compareSorts() {
      var dataSize = document.getElementById("data_size").value;
      // membuat array dengan ukuran yang sesuai dengan input user
      var arr = new       Array(dataSize);
      // mengisi array dengan nilai acak
      for (var i = 0; i < dataSize; i++) {
        arr[i] = Math.floor(Math.random() * dataSize);
      }
      
      var timeBubbleSort = bubbleSort(arr);
      var timeInsertionSort = insertionSort(arr);
      
      // menampilkan hasil perbandingan waktu eksekusi dalam bentuk tulisan
      var resultsDiv = document.getElementById("results");
      resultsDiv.innerHTML = "Bubble Sort: " + timeBubbleSort + " ms<br>" + "Insertion Sort: " + timeInsertionSort + " ms";
      
      // menampilkan grafik menggunakan Chart.js
      var ctx = document.getElementById("myChart").getContext("2d");
      var myChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["Bubble Sort", "Insertion Sort"],
          datasets: [
            {
              label: "Waktu Eksekusi (ms)",
              data: [timeBubbleSort, timeInsertionSort],
              backgroundColor: [
                "rgba(255, 99, 132, 0.2)",
                "rgba(54, 162, 235, 0.2)"
              ],
              borderColor: [
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)"
              ],
              borderWidth: 1
            }
          ]
        },
        options: {
          scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero: true
                }
              }
            ]
          }
        }
      });
    }
    
    // menambahkan event listener pada tombol submit untuk memanggil fungsi compareSorts
    document.querySelector("form").addEventListener("submit", function(event) {
      event.preventDefault();
      compareSorts();
    });
  </script>
</body>
</html>

<form action="index.php" method="post">
  <input type="button" value="Kembali ke Menu Awal" onclick="location.href='index.php'">
</form>

</body>
</html>
