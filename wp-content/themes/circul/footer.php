</div>
</main>


<div class="modal__wrapper modal__wrapper--registration modal__wrapper--hidden" data-modal="sign-in">
    <div class="modal__container">
        <button class="modal__btn" type="button">
            Close modal
        </button>
        <div class="modal__item modal__item--intro">
            <h2 class="modal__title">
                Sign in
            </h2>
            <p class="modal__descriptor">
                Already have an account?
            </p>
            <!-- Remove .modal__selection--passive to switch button to active state-->
            <a class="btn modal__selection modal__selection modal__selection--passive" data-link="modal__item--sign">
                Login
            </a>
            <h2 class="modal__title">
                Create account
            </h2>
            <p class="modal__descriptor">
                By&nbsp;creating an&nbsp;account, you can go&nbsp;through the process of&nbsp;placing an&nbsp;order faster, store stop loss, take part in&nbsp;the loyalty program and much more
            </p>
            <a class="btn modal__selection modal__selection--passive" data-link="modal__item--create-step1">
                Create account
            </a>
        </div>
        <div class="modal__item modal__item--sign">
            <div class="modal__content modal__content--sign">
                <h2 class="modal__title">
                    Sign in
                </h2>
                <form action="#" class="modal__form modal__form--sign">
                    <input class="modal__input modal__input--email" type="email" placeholder="E-mail address">
                    <input class="modal__input modal__input--pass" type="password" placeholder="Password">
                    <a class="modal__forgotten" data-link="modal__item--forgotten">
                        Forgotten your password?
                    </a>
                    <!-- Remove .modal__selection--passive to switch button to active state-->
                    <button class="btn modal__selection modal__selection modal__selection--passive" type="submit">
                        Login
                    </button>
                </form>
                <h3 class="modal__title">
                    Sign in with
                </h3>
                <ul class="modal__socials">
                    <li class="modal__social modal__social--instagram">
                        <a href="#" class="modal__social-reg">
                            Registration via Instagram account
                            <svg class="modal__icon" viewBox="0 0 33 32">
                                <use xlink:href="#instagram"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="modal__social modal__social--twitter">
                        <a href="#" class="modal__social-reg">
                            Registration via Twitter account
                            <svg class="modal__icon" viewBox="0 0 35 28">
                                <use xlink:href="#twitter"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="modal__social modal__social--facebook">
                        <a href="#" class="modal__social-reg">
                            Registration via Facebook account
                            <svg class="modal__icon" viewBox="0 0 36 32">
                                <use xlink:href="#facebook"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="modal__social modal__social--google">
                        <a href="#" class="modal__social-reg">
                            Registration via Google account
                            <svg class="modal__icon" viewBox="0 0 31 32">
                                <use xlink:href="#google"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="modal__content modal__content--create">
                <h2 class="modal__title">
                    Create account
                </h2>
                <p class="modal__descriptor">
                    By&nbsp;creating an&nbsp;account, you can go&nbsp;through the process of&nbsp;placing an&nbsp;order faster, store stop loss, take part in&nbsp;the loyalty program and much more
                </p>
                <a class="btn modal__selection modal__selection--passive" data-link="modal__item--create-step1">
                    Create account
                </a>
            </div>
        </div>
        <div class="modal__item modal__item--create-step1">
            <div class="modal__content modal__content--info">
                <h2 class="modal__title">
                    Create account
                </h2>
                <form action="#" class="modal__form modal__form--create1">
                    <input class="modal__input modal__input--name" type="text" placeholder="First name">
                    <input class="modal__input modal__input--family" type="text" placeholder="Last name">
                    <input class="modal__input modal__input--email" type="email" placeholder="E-mail address">
                    <input class="modal__input modal__input--pass" type="password" placeholder="Password">
                    <input class="modal__input modal__input--pass" type="password" placeholder="Re-enter Password">
                    <!-- Remove .modal__selection--passive to switch button to active state-->
                    <a class="btn modal__selection modal__selection modal__selection--passive" data-link="modal__item--create-step2">
                        Next step
                    </a>
                </form>
            </div>
            <div class="modal__content modal__content--social">
                <h3 class="modal__title">
                    Sign in with
                </h3>
                <ul class="modal__socials">
                    <li class="modal__social modal__social--instagram">
                        <a href="#" class="modal__social-reg">
                            Registration via Instagram account
                            <svg class="modal__icon" viewBox="0 0 33 32">
                                <use xlink:href="#instagram"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="modal__social modal__social--twitter">
                        <a href="#" class="modal__social-reg">
                            Registration via Twitter account
                            <svg class="modal__icon" viewBox="0 0 35 28">
                                <use xlink:href="#twitter"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="modal__social modal__social--facebook">
                        <a href="#" class="modal__social-reg">
                            Registration via Facebook account
                            <svg class="modal__icon" viewBox="0 0 36 32">
                                <use xlink:href="#facebook"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="modal__social modal__social--google">
                        <a href="#" class="modal__social-reg">
                            Registration via Google account
                            <svg class="modal__icon" viewBox="0 0 31 32">
                                <use xlink:href="#google"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="modal__item modal__item--create-step2">
            <div class="modal__content modal__content--info">
                <h2 class="modal__title">
                    Create account
                </h2>
                <form action="#" class="modal__form modal__form--create1">
                    <input class="modal__input modal__input--phone" type="tel" placeholder="Phone number">
                    <input class="modal__input modal__input--country" type="text" placeholder="Country">
                    <input class="modal__input modal__input--city" type="text" placeholder="City">
                    <input class="modal__input modal__input--address" type="text" placeholder="Address & postcode">
                    <input class="modal__input modal__input--office" type="text" placeholder="Post office number">
                    <!-- Remove .modal__selection--passive to switch button to active state-->
                    <button class="btn modal__selection modal__selection modal__selection--passive" type="submit">
                        Create account
                    </button>
                </form>
            </div>
            <div class="modal__content modal__content--social">
                <h3 class="modal__title">
                    Contact us
                </h3>
                <ul class="modal__socials">
                    <li class="modal__social modal__social--instagram">
                        <a href="#" class="modal__social-reg">
                            Visit our Instagram
                            <svg class="modal__icon" viewBox="0 0 33 32">
                                <use xlink:href="#instagram"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="modal__social modal__social--twitter">
                        <a href="#" class="modal__social-reg">
                            Visit our Telegram
                            <svg class="modal__icon" viewBox="0 0 37 29">
                                <use xlink:href="#telegram"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="modal__social modal__social--facebook">
                        <a href="#" class="modal__social-reg">
                            Visito our Facebook
                            <svg class="modal__icon" viewBox="0 0 36 32">
                                <use xlink:href="#facebook"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="modal__item modal__item--forgotten">
            <div class="modal__content modal__content--reset">
                <h2 class="modal__title">
                    Password reset
                </h2>
                <p class="modal__hint">
                    Please submit your email address to receive a password reset link
                </p>
                <form action="#" class="modal__form modal__form--sign">
                    <input class="modal__input modal__input--email" type="email" placeholder="E-mail address">
                    <!-- Remove .modal__selection--passive to switch button to active state-->
                    <button class="btn modal__selection modal__selection modal__selection--passive" type="submit">
                        Submit
                    </button>
                </form>
            </div>
            <div class="modal__content modal__content--create">
                <h2 class="modal__title">
                    Create account
                </h2>
                <p class="modal__descriptor">
                    By&nbsp;creating an&nbsp;account, you can go&nbsp;through the process of&nbsp;placing an&nbsp;order faster, store stop loss, take part in&nbsp;the loyalty program and much more
                </p>
                <a class="btn modal__selection modal__selection--passive" data-link="modal__item--create-step1">
                    Create account
                </a>
            </div>
        </div>
    </div>
</div>


<footer class="footer slide-up">
    <div class="container">
        <dl class="footer__list">
            <dt class="footer__item footer__item--1">
                Shop
            </dt>
            <dd class="footer__content">
                <ul class="footer__submenu">
                    <li class="footer__subitem">
                        <a href="catalog.html" class="footer__link">
                            Man
                        </a>
                    </li>
                    <li class="footer__subitem">
                        <a href="catalog.html" class="footer__link">
                            Woman
                        </a>
                    </li>
                    <li class="footer__subitem">
                        <a href="about.html" class="footer__link">
                            About us
                        </a>
                    </li>
                    <li class="footer__subitem">
                        <a href="stores.html" class="footer__link">
                            Shops
                        </a>
                    </li>
                </ul>
            </dd>
            <dt class="footer__item footer__item--2">
                Customer services
            </dt>
            <dd class="footer__content">
                <ul class="footer__submenu">
                    <li class="footer__subitem">
                        <a href="#" class="footer__link">
                            Wishlist
                        </a>
                    </li>
                    <li class="footer__subitem">
                        <a href="#" class="footer__link">
                            Sign in
                        </a>
                    </li>
                    <li class="footer__subitem">
                        <a href="faq.html" class="footer__link">
                            FAQ
                        </a>
                    </li>
                </ul>
            </dd>
            <dt class="footer__item footer__item--3">
                Social
            </dt>
            <dd class="footer__content">
                <ul class="footer__submenu">
                    <li class="footer__subitem">
                        <a href="#" class="footer__link">
                            Instagram
                        </a>
                    </li>
                    <li class="footer__subitem">
                        <a href="#" class="footer__link">
                            Facebook
                        </a>
                    </li>
                    <li class="footer__subitem">
                        <a href="#" class="footer__link">
                            Telegram
                        </a>
                    </li>
                </ul>
            </dd>
        </dl>
        <div class="footer__credits">
            <p class="footer__copyright">
                © CIRCUL mark 2016
                <span class="footer__origin">
            Made in Ukraine
          </span>
            </p>
            <p class="footer__designer">
                Design Blablabla
            </p>
        </div>
    </div>
</footer>


<?php wp_footer(); ?>
</body>

</html>