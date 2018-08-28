@if($cookieConsentConfig['enabled'] && ! $alreadyConsentedWithCookies)
    <style>
        .js-cookie-consent.cookie-consent {
            position: fixed;
            bottom: 0;
            width: 100%;
            padding: 1rem;
            background-color: #4a32bd;
            color: #b7ade5;
            display: flex;
            z-index: 99999;
        }
        .cookie-consent__message {
            flex: 1;
        }
        @media all and (max-width: 768px) {
            .js-cookie-consent.cookie-consent {
                flex-direction: column;
            }
        }
    </style>

    @include('cookieConsent::dialogContents')

    <script>

        window.laravelCookieConsent = (function () {

            var COOKIE_VALUE = 1;

            function consentWithCookies() {
                setCookie('{{ $cookieConsentConfig['cookie_name'] }}', COOKIE_VALUE, {{ $cookieConsentConfig['cookie_lifetime'] }});
                hideCookieDialog();
            }

            function cookieExists(name) {
                return (document.cookie.split('; ').indexOf(name + '=' + COOKIE_VALUE) !== -1);
            }

            function hideCookieDialog() {
                var dialogs = document.getElementsByClassName('js-cookie-consent');

                for (var i = 0; i < dialogs.length; ++i) {
                    dialogs[i].style.display = 'none';
                }
            }

            function setCookie(name, value, expirationInDays) {
                var date = new Date();
                date.setTime(date.getTime() + (expirationInDays * 24 * 60 * 60 * 1000));
                document.cookie = name + '=' + value + '; ' + 'expires=' + date.toUTCString() +';path=/{{ config('session.secure') ? ';secure' : null }}';
            }

            if(cookieExists('{{ $cookieConsentConfig['cookie_name'] }}')) {
                hideCookieDialog();
            }

            var buttons = document.getElementsByClassName('js-cookie-consent-agree');

            for (var i = 0; i < buttons.length; ++i) {
                buttons[i].addEventListener('click', consentWithCookies);
            }

            return {
                consentWithCookies: consentWithCookies,
                hideCookieDialog: hideCookieDialog
            };
        })();
    </script>

@endif
