
document.getElementById('myForm').addEventListener('submit', function (e) {
    e.preventDefault();

    Swal.fire({
        title: 'Você tem certeza?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, enviar!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Enviado!',
                'Sua mensagem foi enviada com sucesso!',
                'success'
            )
            // Aqui você pode adicionar a lógica de envio do formulário.
        }
    })
});




var swiper = new Swiper(".teachers-slider", {
    spaceBetween: 20,
    grabCursor: true,
    loop: true, // Se você tem apenas 4 slides e quer que eles passem automaticamente, é melhor manter o loop
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    autoplay: {
        delay: 5500, // Aqui você pode ajustar o tempo em milissegundos
        disableOnInteraction: false, // Isso fará com que o autoplay continue mesmo depois do usuário interagir com o Swiper
    },
    slidesPerGroup: 2,
    breakpoints: {
        540: {
            slidesPerView: 1,
            slidesPerGroup: 1 // Para garantir que apenas um slide passe de cada vez em telas pequenas
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 2,
        },
    },
});









const themeToggler = document.querySelector('#theme-toggler');
const htmlElement = document.querySelector('html');

themeToggler.addEventListener('click', () => {
    htmlElement.classList.toggle('dark-theme');
    themeToggler.classList.toggle('#theme-toggler');
});


function closeLoginPopup() {
    var loginPopup = document.getElementById('login-popup');
    loginPopup.style.display = 'none';
}

function openSignupPopup() {
    closeLoginPopup();
    var signupPopup = document.getElementById('signup-popup');
    signupPopup.style.display = 'block'; 
}

// Função para mostrar o pop-up de login
document.getElementById('login-icon').addEventListener('click', function () {
    var loginPopup = document.getElementById('login-popup');
    loginPopup.style.display = 'block';
});



function closeSignupPopup() {
    var loginPopup = document.getElementById('signup-popup');
    loginPopup.style.display = 'none';
}