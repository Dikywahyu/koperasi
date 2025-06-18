document.addEventListener("DOMContentLoaded", function () {
    const formLogin = document.getElementById("formLogin");

    if (formLogin) {
        formLogin.addEventListener("submit", function (e) {
            e.preventDefault();

            const formData = new FormData(formLogin);

            fetch(formLogin.action, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                    Accept: "application/json", // penting untuk memicu respons JSON Laravel
                },
                body: formData,
            })
                .then(async (response) => {
                    if (!response.ok) {
                        const errorData = await response.json();
                        throw errorData;
                    }
                    return response.json();
                })
                .then((result) => {
                    Swal.fire({
                        icon: "success",
                        title: "Login Berhasil!",
                        text: "Anda akan diarahkan...",
                        timer: 2000,
                        showConfirmButton: false,
                    }).then(() => {
                        window.location.href = result.redirect || "/dashboard";
                    });
                })
                .catch((error) => {
                    let message = "Terjadi kesalahan. Coba lagi.";
                    console.error(error);

                    if (error.errors) {
                        message = Object.values(error.errors).flat().join("\n");
                    } else if (error.message) {
                        message = error.message;
                    }

                    Swal.fire({
                        title: "Gagal Login",
                        text: message,
                        icon: "error",
                        customClass: {
                            confirmButton:
                                "btn btn-primary waves-effect waves-light",
                        },
                        buttonsStyling: false,
                    });
                });
        });
    }
});
