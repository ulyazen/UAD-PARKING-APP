<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    /*
 * Globals
 */

    /* Links */
    a,
    a:focus,
    a:hover {
        color: #fff;
    }

    /* Custom default button */
    .btn-secondary,
    .btn-secondary:hover,
    .btn-secondary:focus {
        color: #333;
        text-shadow: none;
        /* Prevent inheritance from `body` */
        background-color: #fff;
        border: .05rem solid #fff;
    }


    /*
 * Base structure
 */

    html,
    body {
        height: 100%;
        background-color: #fb9300;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        color: #fff;
    }

    .cover-container {
        max-width: 96em;
    }


    /*
 * Header
 */
    .masthead {
        margin-bottom: 2rem;
    }

    .masthead-brand {
        margin-bottom: 0;
    }

    .nav-masthead .nav-link {
        padding: .25rem 0;
        font-weight: 700;
        color: rgba(255, 255, 255, .5);
        background-color: transparent;
        border-bottom: .25rem solid transparent;
    }

    .nav-masthead .nav-link:hover,
    .nav-masthead .nav-link:focus {
        border-bottom-color: rgba(255, 255, 255, .25);
    }

    .nav-masthead .nav-link+.nav-link {
        margin-left: 1rem;
    }

    .nav-masthead .active {
        color: #fff;
        border-bottom-color: #fff;
    }

    @media (min-width: 48em) {
        .masthead-brand {
            float: left;
        }

        .nav-masthead {
            float: right;
        }
    }


    /*
 * Cover
 */
    .cover {
        padding: 0 1.5rem;
    }

    .cover .btn-lg {
        padding: .75rem 1.25rem;
        font-weight: 700;
    }


    /*
 * Footer
 */
    .mastfoot {
        color: rgba(255, 255, 255, .5);
    }

    .jumbotron {
        padding-top: 3rem;
        padding-bottom: 3rem;
        margin-bottom: 0;
        background-color: #fff;
    }

    @media (min-width: 768px) {
        .jumbotron {
            padding-top: 6rem;
            padding-bottom: 6rem;
        }
    }

    .jumbotron p:last-child {
        margin-bottom: 0;
    }

    .jumbotron h1 {
        font-weight: 300;
    }
</style>