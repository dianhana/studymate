<x-app-layout>
@section('title', 'Checkout Premium')
<div class="max-w-4xl mx-auto py-10">

    <div class="bg-white rounded-2xl shadow-xl p-8">

        <h1 class="text-3xl font-bold mb-2">
            💳 Pembayaran Premium
        </h1>

        <p class="text-gray-500 mb-8">
            Selesaikan pembayaran untuk mengaktifkan membership Premium.
        </p>

        <div class="grid md:grid-cols-2 gap-8">

            {{-- Detail Paket --}}
            <div class="border rounded-xl p-6">

                <h2 class="text-xl font-bold mb-5">
                    Paket Premium
                </h2>

                <div class="space-y-3 text-gray-700">

                    <p>📅 Durasi : <b>1 Bulan</b></p>

                    <p>📚 Semua Materi Premium</p>

                    <p>🎓 Sertifikat Belajar</p>

                    <p>👨‍🏫 Mentor Eksklusif</p>

                    <p>⬇ Download Tanpa Batas</p>

                </div>

                <hr class="my-6">

                <div class="text-3xl font-bold text-blue-600">

                    Rp39.000

                </div>

            </div>

            {{-- Pembayaran --}}
            <div class="border rounded-xl p-6">

                <h2 class="text-xl font-bold mb-5">

                    Metode Pembayaran

                </h2>

                <div class="space-y-4">

                    <div class="border rounded-lg p-4">
                        💳 Transfer Bank
                    </div>

                    <div class="border rounded-lg p-4">
                        📱 QRIS
                    </div>

                    <div class="border rounded-lg p-4">
                        💰 E-Wallet
                    </div>

                </div>

                <form
                    action="{{ route('premium.pay') }}"
                    method="POST"
                    class="mt-8">

                    @csrf

                    <button
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-bold">

                        Bayar Sekarang

                    </button>

                </form>

                <p class="text-center text-gray-400 text-sm mt-4">

                    *Simulasi pembayaran untuk demo aplikasi.

                </p>

            </div>

        </div>

    </div>

</div>

</x-app-layout>