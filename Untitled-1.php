<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
          
        .profile-container {
            position: relative;
        }
          
        .circle {
            width: 150px;
            height: 150px;
            background-color: lightgray;
            border-radius: 50%;
            margin-bottom: 10px;
        }
          
        .camera-icon {
            position: absolute;
            bottom: 0;
            right: 0;
            cursor: pointer;
        }
          
    </style>
</head>
<body>

    <div class="profile-container">
        <div id="profile-picture" class="circle"></div>
        <label for="file-input" id="camera-icon" class="camera-icon">&#128247;</label>
        <input type="file" id="file-input" style="display:none;">
    </div>

    

    

    <script>
        document.getElementById('camera-icon').addEventListener('click', function() {
            document.getElementById('file-input').click();
          });
          
          document.getElementById('file-input').addEventListener('change', function() {
            const fileInput = this;
            const profilePicture = document.getElementById('profile-picture');
          
            if (fileInput.files && fileInput.files[0]) {
              const reader = new FileReader();
          
              reader.onload = function(e) {
                profilePicture.style.backgroundImage = `url(${e.target.result})`;
          
                // Simpan gambar ke database (gunakan AJAX atau form submission)
                const formData = new FormData();
                formData.append('file', fileInput.files[0]);
          
                // Kirim formData ke server (gunakan AJAX atau form submission)
                // Contoh AJAX:
                // fetch('upload.php', { method: 'POST', body: formData })
                //   .then(response => response.json())
                //   .then(data => console.log(data))
                //   .catch(error => console.error('Error:', error));
              };
          
              reader.readAsDataURL(fileInput.files[0]);
            }
          });
          
    </script>

</body>
</html>