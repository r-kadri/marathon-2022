    @extends('layouts.app')

@section('content')
<div class="page-oeuvre">
    <div class="link-oeuvre">
        <a href="">Découvrir toutes les oeuvres</a>
        <a href=""> <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
            <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 15v-4H7v-2h5V7l5 5-5 5z"></path>
        </svg></a>
    </div>
</div>
<div class="oeuvre-content">
    @foreach ($oeuvres as $oeuvre)
    <div class="oeuvre">
    <div class="card">
            <img class="display" src="{{ asset('storage/' . $oeuvre->media_url) }}" />
            <div class="description">
                <h2>{{$oeuvre->nom}}</h2>
                <p>présentation</p>
                <button class="plus" data-popup-ref="monPopup9">Voir +</button>
            </div>

            <div class="popup" data-popup-id="monPopup9">
                <div class="popup-content">
                    <div class="popup-body">
                        <div class="contenue">
                            <img src="{{ asset('storage/' . $oeuvre->media_url) }}" alt="">
                            <div class="texte">

                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti eligendi facere deserunt laudantium suscipit non illum voluptas! Blanditiis cum dolorem perferendis laudantium fugiat error ipsam sequi incidunt doloremque ullam. Fugiat!
                                </p>
                            </div>
                        </div>
                        <div class="btn">
                            <button class="btn-close" style="color:white ;" data-dismiss-popup>Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="oeuvre">
    <div class="card">
            <img class="display" src="/images/d74774ce15db8411c5dd0e30155a02f4.jpg" />
            <div class="description">
                <h2>Titre</h2>
                <p>présentation</p>
                <button class="plus" data-popup-ref="monPopup9">Voir +</button>
            </div>

            <div class="popup" data-popup-id="monPopup9">
                <div class="popup-content">
                    <div class="popup-body">
                        <div class="contenue">
                            <div class="texte">
                                <h1>Guide d'entretien des usages</h1>
                                <p>
                                    Ce projet à été réalisé dans le cadre universitaire. Nous devions choisir une ville et réaliser un guide d'entretien des usages.
                                </p>
                            </div>
                        </div>
                        <div class="btn">
                            <button class="btn-close" style="color:white ;" data-dismiss-popup>Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="oeuvre">
    <div class="card">
            <img class="display" src="/images/d74774ce15db8411c5dd0e30155a02f4.jpg" />
            <div class="description">
                <h2>Titre</h2>
                <p>présentation</p>
                <button class="plus" data-popup-ref="monPopup9">Voir +</button>
            </div>

            <div class="popup" data-popup-id="monPopup9">
                <div class="popup-content">
                    <div class="popup-body">
                        <div class="contenue">
                            <div class="texte">
                                <h1>Guide d'entretien des usages</h1>
                                <p>
                                    Ce projet à été réalisé dans le cadre universitaire. Nous devions choisir une ville et réaliser un guide d'entretien des usages.
                                </p>
                            </div>
                        </div>
                        <div class="btn">
                            <button class="btn-close" style="color:white ;" data-dismiss-popup>Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="oeuvre">
    <div class="card">
            <img class="display" src="/images/d74774ce15db8411c5dd0e30155a02f4.jpg" />
            <div class="description">
                <h2>Titre</h2>
                <p>présentation</p>
                <button class="plus" data-popup-ref="monPopup9">Voir +</button>
            </div>

            <div class="popup" data-popup-id="monPopup9">
                <div class="popup-content">
                    <div class="popup-body">
                        <div class="contenue">
                            <div class="texte">
                                <h1>Guide d'entretien des usages</h1>
                                <p>
                                    Ce projet à été réalisé dans le cadre universitaire. Nous devions choisir une ville et réaliser un guide d'entretien des usages.
                                </p>
                            </div>
                        </div>
                        <div class="btn">
                            <button class="btn-close" style="color:white ;" data-dismiss-popup>Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="oeuvre">
    <div class="card">
            <img class="display" src="/images/d74774ce15db8411c5dd0e30155a02f4.jpg" />
            <div class="description">
                <h2>Titre</h2>
                <p>présentation</p>
                <button class="plus" data-popup-ref="monPopup9">Voir +</button>
            </div>

            <div class="popup" data-popup-id="monPopup9">
                <div class="popup-content">
                    <div class="popup-body">
                        <div class="contenue">
                            <div class="texte">
                                <h1>Guide d'entretien des usages</h1>
                                <p>
                                    Ce projet à été réalisé dans le cadre universitaire. Nous devions choisir une ville et réaliser un guide d'entretien des usages.
                                </p>
                            </div>
                        </div>
                        <div class="btn">
                            <button class="btn-close" style="color:white ;" data-dismiss-popup>Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="oeuvre">
        <div class="card">
            <img class="display" src="/images/d74774ce15db8411c5dd0e30155a02f4.jpg" />
            <div class="description">
                <h2>Titre</h2>
                <p>présentation</p>
                <button class="plus" data-popup-ref="monPopup9">Voir +</button>
            </div>

            <div class="popup" data-popup-id="monPopup9">
                <div class="popup-content">
                    <div class="popup-body">
                        <div class="contenue">
                            <div class="texte">
                                <h1>Guide d'entretien des usages</h1>
                                <p>
                                    Ce projet à été réalisé dans le cadre universitaire. Nous devions choisir une ville et réaliser un guide d'entretien des usages.
                                </p>
                            </div>
                        </div>
                        <div class="btn">
                            <button class="btn-close" style="color:white ;" data-dismiss-popup>Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>



<script>
    let popupsBtn = document.querySelectorAll("[data-popup-ref]");

    popupsBtn.forEach((btn) => {
        btn.addEventListener("click", activePopup);

        function activePopup() {
            let popupId = btn.getAttribute("data-popup-ref");
            let popup = document.querySelector(`[data-popup-id='${popupId}']`);

            if (popup !== undefined && popup !== null) {
                let popupContent = popup.querySelector(".popup-content");
                let closeBtns = popup.querySelectorAll("[data-dismiss-popup]");

                closeBtns.forEach((btn) => {
                    btn.addEventListener("click", onPopupClose);
                });
                popup.addEventListener("click", onPopupClose);

                popupContent.addEventListener("click", (ev) => {
                    ev.stopPropagation();
                });

                popup.classList.add("active");
                setTimeout(() => {
                    popupContent.classList.add("active");
                }, 1);

                function onPopupClose() {
                    setTimeout(() => {
                        popup.classList.remove("active");
                    }, 250);
                    popupContent.classList.remove("active");
                }
            }
        }
    });



    var sidenav = document.getElementById("mySidenav");
    var openBtn = document.getElementById("openBtn");
    var close = document.getElementsByClassName("choix")
    var slide = document.getElementById('slide');

    const test = document.getElementsByClassName("choix");
    for (let i = 0; i < test.length; i++) {
        test[i].onclick = closeNav;
    }

    openBtn.onclick = openNav;

    /* Set the width of the side navigation to 250px */
    function openNav() {
        sidenav.classList.add("active");
        document.getElementById("openBtn").style.display = 'none';
        slide.classList.add("active")
    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
        sidenav.classList.remove("active");
        document.getElementById("openBtn").style.display = 'block'
        slide.classList.remove("active")
    }
</script>




@endsection
