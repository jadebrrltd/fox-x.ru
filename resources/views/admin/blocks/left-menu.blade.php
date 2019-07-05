<aside class="sidebar">
    <nav class="nav">
        <ul class="nav__list">
            <li class="nav__item">
                <a href="{{ route('admin.admin') }}" class="nav__link @if(Route::currentRouteName() == 'admin.admin') nav__link--active @endif">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="nav-icon" d="M25.9366 15.759H14.244V4.06886C14.244 3.59647 13.866 3.21856 13.3935 3.21856C6.01008 3.21856 0 9.22738 0 16.6093C0 23.9912 6.01008 30 13.3935 30C20.777 30 26.7871 23.9912 26.7871 16.6093C26.7871 16.1432 26.4028 15.759 25.9366 15.759ZM13.3935 28.2994C6.94876 28.2994 1.70097 23.0527 1.70097 16.6093C1.70097 10.4493 6.48887 5.38526 12.543 4.95066V16.6093C12.543 17.0817 12.921 17.4596 13.3935 17.4596H25.0546C24.6199 23.5125 19.5548 28.2994 13.3935 28.2994Z" fill="#4C84FF"/>
                        <path class="nav-icon" d="M30 13.3466C29.9874 10.0966 28.7967 6.9662 26.6485 4.52866C24.1033 1.65022 20.4494 0 16.6065 0C16.134 0 15.756 0.377913 15.756 0.850304V13.3907C15.756 13.8631 16.134 14.241 16.6065 14.241H29.1495C29.622 14.241 30 13.8631 30 13.3907C30 13.3781 30 13.3655 30 13.3466ZM17.4569 12.5467V1.7384C20.4935 1.95885 23.341 3.36343 25.3696 5.6624C27.0706 7.58346 28.0785 10.0021 28.2675 12.5467H17.4569Z" fill="#4C84FF"/>
                    </svg>
                    <span>Статистика</span>
                </a>
            </li>
            <li class="nav__item">
                <a href="{{ route('admin.users') }}" class="nav__link @if(Route::currentRouteName() == 'admin.users') nav__link--active @endif">
                    <svg width="26" height="30" viewBox="0 0 26 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="nav-icon" d="M12.8935 16.1648C12.9239 16.1648 12.9543 16.1648 12.9908 16.1648C13.003 16.1648 13.0152 16.1648 13.0274 16.1648C13.0456 16.1648 13.07 16.1648 13.0882 16.1648C14.8715 16.1338 16.314 15.4939 17.3791 14.27C19.7223 11.5738 19.3328 6.95175 19.2902 6.51067C19.1381 3.19942 17.6043 1.61524 16.3383 0.875958C15.395 0.323048 14.2933 0.0248499 13.0639 0H13.0213C13.0152 0 13.003 0 12.9969 0H12.9604C12.2848 0 10.958 0.111824 9.68596 0.851108C8.40782 1.59039 6.84972 3.17457 6.69756 6.51067C6.65496 6.95175 6.26543 11.5738 8.60868 14.27C9.6677 15.4939 11.1102 16.1338 12.8935 16.1648ZM8.32262 6.66598C8.32262 6.64734 8.3287 6.6287 8.3287 6.61628C8.52955 2.16194 11.6275 1.68358 12.9543 1.68358H12.9787C12.9908 1.68358 13.0091 1.68358 13.0274 1.68358C14.6707 1.72085 17.4643 2.40422 17.653 6.61628C17.653 6.63491 17.653 6.65355 17.6591 6.66598C17.6652 6.70946 18.0912 10.9339 16.1557 13.158C15.3889 14.0402 14.3664 14.475 13.0213 14.4875C13.0091 14.4875 13.003 14.4875 12.9908 14.4875C12.9787 14.4875 12.9726 14.4875 12.9604 14.4875C11.6214 14.475 10.5928 14.0402 9.83203 13.158C7.90266 10.9464 8.31653 6.70325 8.32262 6.66598Z" fill="#4C84FF"/>
                        <path class="nav-icon" d="M25.4983 23.831C25.4983 23.8248 25.4983 23.8186 25.4983 23.8124C25.4983 23.7627 25.4922 23.713 25.4922 23.6571C25.4557 22.427 25.3766 19.5506 22.7351 18.6312C22.7168 18.625 22.6925 18.6188 22.6742 18.6126C19.9293 17.8981 17.6469 16.2829 17.6226 16.2642C17.2513 15.9971 16.74 16.0903 16.4783 16.4692C16.2166 16.8482 16.3079 17.3701 16.6792 17.6372C16.7826 17.7117 19.205 19.4326 22.236 20.2278C23.6541 20.7434 23.8124 22.2903 23.855 23.7068C23.855 23.7627 23.855 23.8124 23.8611 23.8621C23.8672 24.4212 23.8306 25.2847 23.7333 25.7817C22.7473 26.3533 18.8824 28.3288 13.003 28.3288C7.14795 28.3288 3.25877 26.3471 2.2667 25.7755C2.16932 25.2785 2.12671 24.415 2.13888 23.8559C2.13888 23.8062 2.14497 23.7565 2.14497 23.7006C2.18758 22.2841 2.34582 20.7372 3.76394 20.2216C6.79494 19.4264 9.21731 17.6993 9.32078 17.631C9.69204 17.3638 9.78334 16.842 9.52163 16.463C9.25991 16.0841 8.74866 15.9909 8.37739 16.258C8.35305 16.2767 6.08284 17.8919 3.32572 18.6063C3.30138 18.6126 3.28312 18.6188 3.26486 18.625C0.623384 19.5506 0.544261 22.427 0.507743 23.6509C0.507743 23.7068 0.507743 23.7565 0.501656 23.8062C0.501656 23.8124 0.501656 23.8186 0.501656 23.8248C0.49557 24.1479 0.489484 25.8066 0.81206 26.6391C0.872924 26.8006 0.982478 26.9373 1.12855 27.0304C1.31114 27.1547 5.68723 30 13.0091 30C20.331 30 24.7071 27.1485 24.8897 27.0304C25.0296 26.9373 25.1453 26.8006 25.2062 26.6391C25.5105 25.8128 25.5044 24.1541 25.4983 23.831Z" fill="#4C84FF"/>
                    </svg>
                    <span>Пользователи</span>
                </a>
            </li>
            <li class="nav__item">
                <a href="{{ route('admin.wallet') }}" class="nav__link @if(Route::currentRouteName() == 'admin.wallet') nav__link--active @endif">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="nav-icon" d="M29.3633 12.9551H28.598V7.78776C28.598 6.57551 27.6429 5.62041 26.4918 5.62041H25.9163V2.16735C25.9163 0.955102 25.0224 0 23.9388 0C23.9388 0 23.8776 0 23.8102 0L1.97755 5.61429C1.97143 5.61429 1.95918 5.62041 1.95306 5.62041C0.87551 5.70612 0 6.63061 0 7.78776V27.8327C0 29.0449 0.955102 30 2.10612 30H26.4918C27.7041 30 28.6592 29.0449 28.6592 27.8327V22.5306H29.3633C29.749 22.5306 30 22.2735 30 21.8939V13.598C30 13.2122 29.6816 12.9551 29.3633 12.9551ZM24.0612 1.21224C24.3796 1.27347 24.698 1.65918 24.698 2.16735V5.61429H7.08367L24.0612 1.21224ZM27.3857 27.8327C27.3857 28.3408 27 28.7878 26.4918 28.7878H2.10612C1.59796 28.7878 1.21224 28.3408 1.21224 27.8327V7.78776C1.21224 7.27959 1.59796 6.83265 2.10612 6.83265H26.4245C26.9327 6.83265 27.3184 7.27959 27.3184 7.78776V12.9551H21C18.3184 12.9551 16.2122 15.0612 16.2122 17.7429C16.2122 20.4245 18.3796 22.5306 21 22.5306H27.3857V27.8327ZM28.7204 21.3184H21C19.0837 21.3184 17.4918 19.7204 17.4918 17.8102C17.4918 15.9 19.0898 14.302 21 14.302H28.7204V21.3184Z" fill="#4C84FF"/>
                        <path class="nav-icon" d="M20.2959 17.8714C20.2959 18.2571 20.6143 18.5082 20.9327 18.5082H21.5082C21.8265 18.5082 22.1449 18.251 22.1449 17.8714C22.1449 17.4857 21.8265 17.2347 21.5082 17.2347H20.9388C20.5531 17.2347 20.2959 17.4918 20.2959 17.8714Z" fill="#4C84FF"/>
                    </svg>
                    <span>Пополнение</span>
                </a>
            </li>
            <li class="nav__item">
                <a href="{{ route('admin.output') }}" class="nav__link @if(Route::currentRouteName() == 'admin.output') nav__link--active @endif">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="nav-icon" d="M5.00004 4.00002C5.00004 3.44853 4.55156 3 4.00002 3C3.44901 3 3 3.44848 3 4.00002C3 4.5515 3.44901 5.00003 4.00002 5.00003C4.55156 4.99998 5.00004 4.5515 5.00004 4.00002Z" fill="#4C84FF"/>
                        <path class="nav-icon" d="M25.4995 8.99976C25.2235 8.99976 24.9995 9.22376 24.9995 9.49973V27.4997C24.9995 28.3272 24.327 28.9997 23.4995 28.9997H6.49947C5.67248 28.9997 4.99947 28.3272 4.99947 27.4997V9.99977H23.4995C23.776 9.99977 23.9994 9.7763 23.9994 9.49979C23.9994 9.22382 23.776 8.99981 23.4995 8.99981H4.49949C4.22352 8.99981 3.99951 9.22382 3.99951 9.49979V27.4998C3.99951 28.8782 5.12152 29.9998 6.49953 29.9998H23.4995C24.878 29.9998 25.9995 28.8783 25.9995 27.4998V9.49979C25.9995 9.22376 25.776 8.99976 25.4995 8.99976Z" fill="#4C84FF"/>
                        <path class="nav-icon" d="M12.4995 4.49996C12.776 4.49996 12.9995 4.27648 12.9995 3.99998C12.9995 3.724 12.776 3.5 12.4995 3.5H7.49949C7.22351 3.5 6.99951 3.724 6.99951 3.99998C6.99951 4.27648 7.22351 4.49996 7.49949 4.49996H12.4995Z" fill="#4C84FF"/>
                        <path class="nav-icon" d="M27 11.5C27 11.7765 27.224 12 27.4999 12C27.7764 12 27.9999 11.7765 27.9999 11.5V7.49998C27.9999 7.224 27.7764 7 27.4999 7H2.49998C2.224 7 2 7.224 2 7.49998V11.5C2 11.7765 2.224 12 2.49998 12C2.77648 12 2.99996 11.7765 2.99996 11.5V8.00002H27V11.5Z" fill="#4C84FF"/>
                        <path class="nav-icon" d="M9.84303 11.019C9.57654 10.9446 9.30051 11.098 9.22603 11.364C9.07603 11.894 8.99951 12.4446 8.99951 13C8.99951 16.3085 11.691 19 14.9995 19C18.3085 19 20.9995 16.3085 20.9995 13C20.9995 12.445 20.9235 11.8945 20.7735 11.3645C20.699 11.099 20.4195 10.9465 20.1565 11.0195C19.891 11.0945 19.7365 11.371 19.8115 11.6365C19.9365 12.0785 19.9995 12.537 19.9995 13C19.9995 15.7574 17.7565 18 14.9996 18C12.2431 18 9.99959 15.7574 9.99959 13C9.99959 12.5365 10.0631 12.078 10.1876 11.636C10.263 11.3705 10.1085 11.094 9.84303 11.019Z" fill="#4C84FF"/>
                        <path class="nav-icon" d="M27.5 0H2.50002C1.12201 0 0 1.12201 0 2.50002V13.5C0 14.8785 1.12201 16 2.50002 16C2.77652 16 3 15.7765 3 15.5C3 15.2241 2.77652 15.0001 2.50002 15.0001C1.67303 15.0001 1.00002 14.3276 1.00002 13.5001V2.50002C1.00002 1.67303 1.67303 1.00002 2.50002 1.00002H27.5C28.3276 1.00002 29 1.67303 29 2.50002V13.5C29 14.3275 28.3276 15 27.5 15C27.2241 15 27.0001 15.224 27.0001 15.5C27.0001 15.7765 27.2241 16 27.5 16C28.8785 16 30.0001 14.8785 30.0001 13.4999V2.50002C30 1.12201 28.8785 0 27.5 0Z" fill="#4C84FF"/>
                        <path class="nav-icon" d="M6.50047 11C6.22449 11 6.00049 11.224 6.00049 11.5V24.5C6.00049 24.7765 6.22449 25 6.50047 25C7.87895 25 9.00049 26.122 9.00049 27.5C9.00049 27.7765 9.22449 28 9.50047 28H20.5005C20.777 28 21.0004 27.7765 21.0004 27.5C21.0004 26.122 22.1224 25 23.5005 25C23.777 25 24.0004 24.7765 24.0004 24.5V11.5C24.0004 11.2241 23.777 11.0001 23.5005 11.0001C23.2245 11.0001 23.0005 11.2241 23.0005 11.5V24.0361C21.4699 24.2561 20.256 25.4696 20.0364 27.0001H9.965C9.74551 25.4696 8.5315 24.2561 7.00051 24.0361V11.5C7.00051 11.224 6.77697 11 6.50047 11Z" fill="#4C84FF"/>
                        <path class="nav-icon" d="M13.5005 12.0002C13.777 12.0002 14.0005 11.7767 14.0005 11.5002C14.0005 11.2242 13.777 11.0002 13.5005 11.0002C12.5715 11.0002 11.795 11.6403 11.5715 12.5002H11.5005C11.2245 12.5002 11.0005 12.7242 11.0005 13.0002C11.0005 13.2767 11.2245 13.5002 11.5005 13.5002H11.5715C11.795 14.3607 12.5715 15.0002 13.5005 15.0002C14.604 15.0002 15.5005 14.1032 15.5005 13.0002C15.5005 12.4487 15.9495 12.0002 16.5005 12.0002C17.052 12.0002 17.5005 12.4487 17.5005 13.0002C17.5005 13.5517 17.0521 14.0002 16.5005 14.0002C16.2245 14.0002 16.0005 14.2242 16.0005 14.5002C16.0005 14.7767 16.2245 15.0002 16.5005 15.0002C17.43 15.0002 18.2065 14.3607 18.43 13.5002H18.5005C18.777 13.5002 19.0005 13.2767 19.0005 13.0002C19.0005 12.7242 18.777 12.5002 18.5005 12.5002H18.43C18.2065 11.6403 17.43 11.0002 16.5005 11.0002C15.3975 11.0002 14.5005 11.8977 14.5005 13.0002C14.5005 13.5517 14.052 14.0002 13.5005 14.0002C12.9495 14.0002 12.5005 13.5518 12.5005 13.0002C12.5005 12.4487 12.9495 12.0002 13.5005 12.0002Z" fill="#4C84FF"/>
                    </svg>
                    <span>Вывод</span>
                </a>
            </li>
            <li class="nav__item">
                <a href="{{ route('admin.promocodes') }}" class="nav__link @if(Route::currentRouteName() == 'admin.promocodes') nav__link--active @endif">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="nav-icon" d="M26.5691 7.86697L26.2419 8.19414C25.6292 8.80684 25.1836 8.98408 24.2553 8.98408C22.3783 8.98408 21.0159 7.62171 21.0159 5.74474C21.0159 4.81644 21.1932 4.3708 21.8059 3.7581L22.133 3.43092L18.7021 0L0 18.7021L3.43092 22.133L3.7581 21.8059C4.3708 21.1932 4.81644 21.0159 5.74474 21.0159C7.62171 21.0159 8.98408 22.3783 8.98408 24.2553C8.98408 25.1836 8.80684 25.6292 8.19414 26.2419L7.86697 26.5691L11.2979 30L30 11.2979L26.5691 7.86697ZM9.16271 26.5557C9.71432 25.8981 9.90961 25.2645 9.90961 24.2553C9.90961 21.8808 8.11918 20.0904 5.74474 20.0904C4.73545 20.0904 4.10193 20.2857 3.44388 20.8373L1.30869 18.7021L12.2234 7.78737L13.7473 9.31125L14.4016 8.65691L12.8778 7.13303L18.7021 1.30869L20.8373 3.44434C20.2857 4.10193 20.0904 4.73545 20.0904 5.74474C20.0904 8.11918 21.8808 9.90961 24.2553 9.90961C25.2645 9.90961 25.8981 9.71432 26.5561 9.16271L28.6913 11.2979L22.867 17.1222L21.3431 15.5984L20.6887 16.2527L22.2126 17.7766L11.2979 28.6913L9.16271 26.5557Z" fill="#4C84FF"/>
                        <path class="nav-icon" d="M16.5239 12.0883L14.6728 10.2372L15.3272 9.5829L17.1782 11.4339L16.5239 12.0883Z" fill="#4C84FF"/>
                        <path class="nav-icon" d="M19.7632 15.3276L17.9122 13.4766L18.5665 12.8222L20.4176 14.6733L19.7632 15.3276Z" fill="#4C84FF"/>
                    </svg>
                    <span>Промокод</span>
                </a>
            </li>
            <li class="nav__item">
                <a href="{{ route('admin.games') }}" class="nav__link @if(Route::currentRouteName() == 'admin.games') nav__link--active @endif">
                    <svg width="30" height="20" viewBox="0 0 30 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="nav-icon" d="M29.9839 13.9231C29.9091 12.2042 29.6102 10.2985 29.1618 8.50497C28.7134 6.78612 28.1529 5.17937 27.4803 3.94628C24.8647 -0.649772 22.0249 0.0601877 18.6245 0.956978C17.5409 1.21854 16.3826 1.51747 15.1868 1.62957H14.8132C13.6174 1.51747 12.4591 1.21854 11.3755 0.956978C7.97514 0.097554 5.1353 -0.649771 2.51967 3.98365C1.84707 5.21673 1.24921 6.82348 0.838183 8.54233C0.389787 10.3359 0.0908573 12.2416 0.0161248 13.9604C-0.0586078 15.8661 0.128224 17.2487 0.539253 18.2202C0.950282 19.117 1.54814 19.6775 2.33283 19.9017C3.04279 20.0885 3.86485 20.0138 4.72428 19.6401C6.18156 19.0423 7.86304 17.7718 9.50716 16.2398C10.6655 15.1188 12.8328 14.5583 15 14.5583C17.1672 14.5583 19.3345 15.1188 20.4928 16.2398C22.137 17.7718 23.8184 19.0423 25.2757 19.6401C26.1351 19.9764 26.9572 20.0885 27.6672 19.9017C28.4145 19.6775 29.0497 19.1544 29.4607 18.1828C29.8718 17.2487 30.0586 15.8661 29.9839 13.9231ZM28.1903 17.6597C27.9661 18.1828 27.6672 18.4818 27.2935 18.5939C26.8825 18.706 26.3593 18.6312 25.7615 18.407C24.4537 17.8839 22.9217 16.7255 21.427 15.3056C20.0071 13.8857 17.5035 13.1758 15 13.1758C12.4965 13.1758 9.99292 13.8857 8.53563 15.2309C7.00362 16.6508 5.4716 17.8465 4.20115 18.3323C3.60329 18.5565 3.08016 18.6686 2.66913 18.5191C2.29547 18.407 1.99654 18.1081 1.77234 17.585C1.47341 16.875 1.32394 15.7167 1.39868 13.9978C1.47341 12.3911 1.73497 10.5601 2.18337 8.84126C2.5944 7.23451 3.11753 5.73986 3.75275 4.61887C5.8079 0.919612 8.19934 1.51747 11.0392 2.2648C12.1975 2.56373 13.3933 2.86266 14.7011 2.97476C14.7384 2.97476 14.7384 2.97476 14.7758 2.97476H15.1868C15.2242 2.97476 15.2242 2.97476 15.2616 2.97476C16.6068 2.86266 17.8025 2.56373 18.9608 2.2648C21.8007 1.55484 24.1921 0.919612 26.2472 4.61887C26.8825 5.73986 27.4056 7.19715 27.8166 8.84126C28.2277 10.5601 28.5266 12.3537 28.6013 13.9978C28.6761 15.7167 28.5266 16.875 28.1903 17.6597Z" fill="#4C84FF"/>
                        <path class="nav-icon" d="M11.5623 6.63664C11.1886 6.30035 10.7402 6.03878 10.2171 6.00142C10.1798 5.51566 9.95555 5.02989 9.61926 4.6936L9.58189 4.65623C9.17086 4.2452 8.64773 4.02101 8.04987 4.02101C7.45201 4.02101 6.89152 4.28257 6.51786 4.65623C6.18156 4.99253 5.92 5.47829 5.88263 6.00142C5.3595 6.03878 4.91111 6.26298 4.53744 6.59928L4.50008 6.63664C4.08905 7.04767 3.86485 7.5708 3.86485 8.16866C3.86485 8.76652 4.12642 9.32702 4.50008 9.70068C4.87374 10.0743 5.32214 10.2985 5.88263 10.3359C5.92 10.859 6.14419 11.3448 6.51786 11.6811C6.92889 12.0921 7.45201 12.3163 8.04987 12.3163C8.64773 12.3163 9.20823 12.0548 9.58189 11.6811C9.91819 11.3074 10.1798 10.859 10.2171 10.3359C10.7402 10.2985 11.226 10.0743 11.5623 9.70068C11.9733 9.28965 12.1975 8.76652 12.1975 8.16866C12.1975 7.5708 11.936 7.01031 11.5623 6.63664ZM10.6281 8.72916C10.4787 8.87862 10.2919 8.95335 10.0677 8.95335H9.54452C9.17086 8.95335 8.83457 9.25228 8.83457 9.66331V10.1491C8.83457 10.3733 8.75983 10.5601 8.61037 10.7096C8.4609 10.859 8.27407 10.9338 8.04987 10.9338C7.82568 10.9338 7.63884 10.859 7.48938 10.7096C7.33991 10.5601 7.26518 10.3733 7.26518 10.1491V9.62595C7.26518 9.25228 6.96625 8.91599 6.55522 8.91599H6.03209C5.8079 8.91599 5.62107 8.84126 5.4716 8.69179C5.3595 8.57969 5.2474 8.39286 5.2474 8.16866C5.2474 7.94446 5.32214 7.75763 5.4716 7.60817C5.4716 7.60817 5.4716 7.60817 5.50897 7.5708C5.65843 7.4587 5.84526 7.38397 6.03209 7.38397H6.55522C6.92888 7.38397 7.26518 7.08504 7.26518 6.67401V6.15088C7.26518 5.92669 7.33991 5.73985 7.48938 5.59039C7.63884 5.44092 7.82568 5.36619 8.04987 5.36619C8.27407 5.36619 8.4609 5.44092 8.61037 5.59039C8.61037 5.59039 8.61037 5.59039 8.64773 5.62776C8.75983 5.77722 8.83457 5.96405 8.83457 6.15088V6.67401C8.83457 7.04767 9.1335 7.38397 9.54452 7.38397H10.0677C10.2919 7.38397 10.4787 7.4587 10.6281 7.60817C10.7776 7.75763 10.8523 7.94446 10.8523 8.16866C10.8523 8.39286 10.7776 8.57969 10.6281 8.72916Z" fill="#4C84FF"/>
                        <path class="nav-icon" d="M21.5017 6.82348C22.224 6.82348 22.8096 6.23795 22.8096 5.51566C22.8096 4.79337 22.224 4.20784 21.5017 4.20784C20.7794 4.20784 20.1939 4.79337 20.1939 5.51566C20.1939 6.23795 20.7794 6.82348 21.5017 6.82348Z" fill="#4C84FF"/>
                        <path class="nav-icon" d="M21.5017 12.1295C22.224 12.1295 22.8096 11.544 22.8096 10.8217C22.8096 10.0994 22.224 9.51384 21.5017 9.51384C20.7794 9.51384 20.1939 10.0994 20.1939 10.8217C20.1939 11.544 20.7794 12.1295 21.5017 12.1295Z" fill="#4C84FF"/>
                        <path class="nav-icon" d="M18.8487 9.47648C19.571 9.47648 20.1565 8.89095 20.1565 8.16866C20.1565 7.44638 19.571 6.86085 18.8487 6.86085C18.1264 6.86085 17.5409 7.44638 17.5409 8.16866C17.5409 8.89095 18.1264 9.47648 18.8487 9.47648Z" fill="#4C84FF"/>
                        <path class="nav-icon" d="M24.1547 9.47648C24.877 9.47648 25.4626 8.89095 25.4626 8.16866C25.4626 7.44638 24.877 6.86085 24.1547 6.86085C23.4324 6.86085 22.8469 7.44638 22.8469 8.16866C22.8469 8.89095 23.4324 9.47648 24.1547 9.47648Z" fill="#4C84FF"/>
                    </svg>
                    <span>Игры</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>