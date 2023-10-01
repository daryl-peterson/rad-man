import { useRef } from 'react';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { useForm } from '@inertiajs/react';
import { Transition } from '@headlessui/react';

export default function updateNasForm({ object, className = '' }) {
    console.log(object);
    const shortnameInput = useRef();
    const nasnameInput = useRef();

    const { data, setData, errors, put, reset, processing, recentlySuccessful } = useForm({
        nasname: object.nasname,
        shortname: object.shortname,
    });

    const updateNas = (e) => {
        e.preventDefault();

        put(route('nas.update'), {
            preserveScroll: true,
            onSuccess: () => reset(),
            onError: (errors) => {
                if (errors.shortname) {
                    shortnameInput.current.focus();
                }

                if (errors.nasname) {
                    nasnameInput.current.focus();
                }
            },
        });
    };

    return (
        <section className={className}>
            <header>
                <h2 className="text-lg font-medium text-gray-900">Update NAS</h2>
            </header>

            <form onSubmit={updateNas} className="mt-6 space-y-6">
                <div>
                    <InputLabel htmlFor="nasname" value="NAS Name" />

                    <TextInput
                        id="nasname"
                        ref={nasnameInput}
                        value={data.nasname}
                        onChange={(e) => setData('nasname', e.target.value)}
                        type="text"
                        className="mt-1 block w-full"
                    />

                    <InputError message={errors.nasname} className="mt-2" />
                </div>

                <div>
                    <InputLabel htmlFor="shortname" value="Short Name" />

                    <TextInput
                        id="shortname"
                        ref={shortnameInput}
                        value={data.shortname}
                        onChange={(e) => setData('shortname', e.target.value)}
                        type="text"
                        className="mt-1 block w-full"
                        autoComplete="new-password"
                    />

                    <InputError message={errors.password} className="mt-2" />
                </div>

                <div className="flex items-center gap-4">
                    <PrimaryButton disabled={processing}>Save</PrimaryButton>

                    <Transition
                        show={recentlySuccessful}
                        enter="transition ease-in-out"
                        enterFrom="opacity-0"
                        leave="transition ease-in-out"
                        leaveTo="opacity-0"
                    >
                        <p className="text-sm text-gray-600">Saved.</p>
                    </Transition>
                </div>
            </form>
        </section>
    );
}
