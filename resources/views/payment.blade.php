<x-app-layout>

<div class="max-w-2xl mx-auto py-10">

    <div class="bg-white rounded-xl shadow p-8">

        <h1 class="text-3xl font-bold mb-2">
            Pembayaran Premium
        </h1>

        <p class="text-gray-500 mb-8">
            Pilih metode pembayaran untuk mengaktifkan Premium selama 1 bulan.
        </p>

        <div class="bg-blue-50 border rounded-lg p-5 mb-8">

            <h2 class="font-bold text-xl">

                StudyMate Premium

            </h2>

            <div class="text-4xl font-bold text-blue-700 mt-3">

                Rp39.000

            </div>

            <div class="text-gray-500">

                Berlaku selama 30 hari

            </div>

        </div>

        <form action="{{ route('premium.process') }}" method="POST">

            @csrf

            <label class="font-semibold">
                Pilih Metode Pembayaran
            </label>

            <select
                name="payment_method"
                class="w-full border rounded-lg p-3 mt-3 mb-8">

                <option value="">-- Pilih --</option>
                <option value="QRIS">QRIS</option>
                <option value="BCA">Transfer BCA</option>
                <option value="Mandiri">Transfer Mandiri</option>
                <option value="Dana">DANA</option>
                <option value="OVO">OVO</option>
                <option value="GoPay">GoPay</option>

            </select>

            <button
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-bold">

                Bayar Sekarang

            </button>

        </form>

    </div>

</div>

</x-app-layout>