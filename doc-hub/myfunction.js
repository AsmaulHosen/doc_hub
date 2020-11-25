
function MyEmailWarningFn() {
    swal({
        title: "Email is not available! Please try with another email.",
        text: "",
        type: "warning",
        timer: 5000,
        showConfirmButton: false,
    },
        window.load = function () {
            window.location = 'registration.php';
        });
}
function MyRegistrationSuccessFn() {
    swal({
        title: "Registration successful ! Your Data has been saved successfully on Doctor's Hub database",
        text: "",
        type: "success",
        timer: 5000,
        showConfirmButton: false,
    },
        window.load = function () {
            window.location = 'login.php';
        });
}

function MyRegistrationWarningFn() {
    swal({
        title: "Sorry User !! Something went wrong, Please try again later.",
        text: "Invalid Attempt",
        type: "danger",
        timer: 5000,
        showConfirmButton: false,
    },
        window.load = function () {
            window.location = 'registration.php';
        });
}

function MyWarningFn() {
    swal({
        title: "Sorry User !! Something went wrong, Please try again later.",
        text: "Invalid Attempt",
        type: "danger",
        timer: 5000,
        showConfirmButton: false,
    },
        window.load = function () {
            window.location = 'login.php';
        });
}

function MyLogoutFn() {
    swal({
        title: "You have been successfully logged out!",
        text: " Please login in again if you need",
        type: "success",
        timer: 5000,
        showConfirmButton: true,
    },
        window.load = function () {
            window.location = 'logout.php';
        });
}





