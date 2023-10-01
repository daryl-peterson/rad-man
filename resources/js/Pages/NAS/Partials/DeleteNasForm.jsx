import { useRef, useState } from 'react';
import DangerButton from '@/Components/DangerButton';
import Modal from '@/Components/Modal';
import SecondaryButton from '@/Components/SecondaryButton';
import { useForm } from '@inertiajs/react';

export default function DeleteNasForm({ className = '' }) {
    const [confirmingNasDeletion, setConfirmingNasDeletion] = useState(false);

    const {
        data,
        setData,
        delete: destroy,
        processing,
        reset,
        errors,
    } = useForm({
        password: '',
    });

    const confirmNasDeletion = () => {
        setConfirmingNasDeletion(true);
    };

    const deleteNAS = (e) => {
        e.preventDefault();

        destroy(route('nas.destroy'), {
            preserveScroll: true,
            onSuccess: () => closeModal(),
            onFinish: () => reset(),
        });
    };

    const closeModal = () => {
        setConfirmingNasDeletion(false);

        reset();
    };

    return (
        <section className={`space-y-6 ${className}`}>
            <header>
                <h2 className="text-lg font-medium text-gray-900">Delete NAS</h2>

                <p className="mt-1 text-sm text-gray-600">
                    Once your NAS is deleted, radius request will not be accepted from it.
                </p>
            </header>

            <DangerButton onClick={confirmNasDeletion}>Delete NAS</DangerButton>

            <Modal show={confirmingNasDeletion} onClose={closeModal}>
                <form onSubmit={deleteNAS} className="p-6">
                    <h2 className="text-lg font-medium text-gray-900">
                        Are you sure you want to delete this nas?
                    </h2>

                    <div className="mt-6 flex justify-end">
                        <SecondaryButton onClick={closeModal}>Cancel</SecondaryButton>

                        <DangerButton className="ml-3" disabled={processing}>
                            Delete NAS
                        </DangerButton>
                    </div>
                </form>
            </Modal>
        </section>
    );
}
