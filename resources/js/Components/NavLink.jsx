import { Link } from '@inertiajs/react';

export default function NavLink({ active = false, className = '', children, ...props }) {
    return (
        <Link
            {...props}
            className={
                'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 transition ' +
                'duration-150 ease-in-out focus:outline-none no-underline px-3 py-2 ' +
                (active
                    ? 'bg-gray-900 text-white rounded-md '
                    : 'text-gray-300 hover:bg-gray-700 hover:text-white '
                ) +
                className
            }
        >
            {children}
        </Link>
    );
}
