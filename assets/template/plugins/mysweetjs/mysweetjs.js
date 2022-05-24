const flashData = $('.flash-data').data('flashdata');
const flashDataFailed = $('.flash-data-failed').data('flashdatafailed');
const flashDataLoginFailed = $('.flash-data-login-failed').data('flashdataloginfailed');

if (flashData) {
    Swal.fire({
        title: 'Success',
        text: 'Your File ' + flashData,
        icon: 'success',
        showConfirmButton: false,
        timer: 2000
    });
}

if (flashDataFailed) {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Email tidak terdaftar!',
        showConfirmButton: true
    })
    // console.log("flashDataFailed: ", flashDataFailed);
}

if (flashDataLoginFailed) {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Password Salah!',
        showConfirmButton: true
    })
    // console.log("flashDataloginFailed: ", flashDataLoginFailed);
}

$('.del_btn').on('click', function (e) {
    e.preventDefault();

    const remBtnHref = $(this).attr('href');

    Swal.fire({
        title: 'Are you sure?',
        text: "Want to Delete this Video...!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = remBtnHref;
        }
    })
})

$('.del_user').on('click', function (e) {
    e.preventDefault();

    const remUserHref = $(this).attr('href');

    Swal.fire({
        title: 'Are you sure?',
        text: "Want To Delete this User...!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete this user!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = remUserHref;
        }
    })
})

$('.logout_btn').on('click', function (e) {
    e.preventDefault();

    const logoutHref = $(this).attr('href');

    Swal.fire({
        title: 'LogOut?',
        text: "Are you sure, want to logout...!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, LogOut!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = logoutHref;
        }
    })
})