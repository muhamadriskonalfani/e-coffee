        <div class="profile-container-right"></div>
    </div>
    

    <?php
        if(isset($_GET['logout'])) {
            session_destroy();
            echo "<meta http-equiv=refresh content=0;URL='../index.php'>";
        }
    ?>

    <script src="../assets/sweetalert/sweetalert2.all.min.js"></script>

    <script>

        // Logout Button
        const logoutButton = document.querySelector('.logout-button');

        logoutButton.addEventListener('click', (event) => {
            event.preventDefault();
            const userID = logoutButton.getAttribute('user-id'); // Menggunakan logoutButton, bukan document

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, log me out!" // Mengubah teks tombol konfirmasi
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `?logout=${userID}`;
                } else {
                    Swal.fire("Cancelled", "Your session is safe :)", "info"); // Mengubah pesan pembatalan
                }
            });
        });

        logoutButton.addEventListener('mouseenter', () => {
            setTimeout(() => {
                document.getElementById('logout-svg').setAttribute('fill', '#fff');
            }, 20)
        });
        logoutButton.addEventListener('mouseleave', () => {
            setTimeout(() => {
                document.getElementById('logout-svg').setAttribute('fill', 'var(--chocolate)');
            }, 20)
        });


        // Edit Button 
        const editButton = document.querySelector('.edit-button');
        const updateButton = document.querySelector('.update');
        const cancelButton = document.querySelector('.cancel-update');
        const showData = document.querySelectorAll('.show-data');
        const hiddenInput = document.querySelectorAll('.hidden-input');
        const titleDisplay = document.querySelector('.title');
        
        editButton.addEventListener('click', () => {
            titleDisplay.innerHTML = 'Update Your Data';
            showData.forEach((e) => e.classList.add('hide'));
            hiddenInput.forEach((e) => e.classList.remove('hide'));
            editButton.classList.add('hide');
            updateButton.classList.remove('hide');
            cancelButton.classList.remove('hide');
        })

        function updateDataProfile() {
            updateButton.removeEventListener('click', updateDataProfile);

            const nickname = document.querySelector('input[name="nama_depan"]').value;
            const lastname = document.querySelector('input[name="nama_belakang"]').value;
            const username = document.querySelector('input[name="username"]').value;
            const email = document.querySelector('input[name="alamat_email"]').value;
            const phone = document.querySelector('input[name="nomor_telepon"]').value;
            const address = document.querySelector('input[name="alamat_pengiriman"]').value;
            const city = document.querySelector('input[name="kota"]').value;

            if (nickname.trim() !== '' && lastname.trim() !== '' && username.trim() !== '' && email.trim() !== '' && phone.trim() !== '' && address.trim() !== '' && city.trim() !== '') {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, update it!" // Mengubah teks tombol konfirmasi
                }).then((result) => {
                    if (result.isConfirmed) {
                        updateButton.type = 'submit';
                        updateButton.click();
                    } else {
                        window.location.href = `profile-data.php`;
                    }
                });

            } else {
                Swal.fire({
                    title: "Ada yang terlewat...",
                    text: "Silahkan lengkapi data anda!",
                    icon: "info"
                });
                updateButton.addEventListener('click', updateDataProfile);
            }

        }
        updateButton.addEventListener('click', updateDataProfile);
        

        // Update Photo Profile
        const inputPhoto = document.querySelector('input#input-photo');
        const formPhoto = document.querySelector('form#form-photo');
        const buttonUpdatePhoto = document.querySelector('button[name="update-photo"]');

        inputPhoto.addEventListener('change', () => {
            buttonUpdatePhoto.click();
        })

        

    </script>
    
</body>
</html>



