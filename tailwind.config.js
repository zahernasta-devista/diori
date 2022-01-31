const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        screens: {
            'sm': '500px',
            'md': [
              // Sidebar appears at 768px, so revert to `sm:` styles between 768px
              // and 868px, after which the main content area is wide enough again to
              // apply the `md:` styles.
              {'min': '668px', 'max': '767px'},
              {'min': '868px'}
            ],
            'lg': '1100px',
            'xl': '1400px',
          },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
