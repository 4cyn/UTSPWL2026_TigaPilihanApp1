<x-app-layout>

    {{-- ALERT --}}
    @if(session('error'))
        <div class="bg-[#fff2cc] text-[#fd593d] p-3 rounded mb-4 border border-[#fd593d]">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div 
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 3000)"
            x-transition
            class="p-3 mb-4 bg-green-100 text-green-700 border border-green-400 rounded"
        >
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- BANNER --}}
        <div class="w-full aspect-[16/9] mb-8">
            <img 
                src="{{ asset('images/banner.png') }}" 
                class="w-full h-full object-cover"
                alt="Banner"
        >
        </div>

        {{-- TENTANG KAMI --}}
        <div class="rounded-2xl p-6 mb-8 flex flex-col md:flex-row items-center gap-6">
            <img src="{{ asset('images/Logowoutline.png') }}" 
                class="w-40 h-40 object-cover rounded-xl bg-white shadow-md">

            <div>
                <h1 class="text-2xl font-bold text-gray-800 mb-2">
                    Tentang Kami
                </h1>
                <p class="text-gray-600 text-justify">
                    TigaPilihan.ptk adalah sebuah usaha bisnis yang bergerak di bidang perdagangan sembako yang menyediakan produk kebutuhan pokok serta layanan jasa sebagai nilai tambah bagi konsumen. Produk utama yang ditawarkan dalam usaha ini meliputi minyak goreng, gula pasir, serta daging ayam dan sapi yang dijual dengan harga yang kompetitif dan menyesuaikan dengan kondisi pasar.
                </p>
            </div>
        </div>

        {{-- VISI MISI --}}
        <div class="grid md:grid-cols-2 gap-6 mb-12">
            <div class="bg-white shadow-md rounded-2xl p-6">
                <h2 class="text-xl font-semibold text-justify text-[#fd593d] mb-3">Visi</h2>
                <p class="text-gray-800">
                    “Menjadi alternatif mudah bagi konsumen dalam memenuhi kebutuhan pokok yang berkualitas dan praktis dengan harga kompetitif”
                </p>
            </div>

            <div class="bg-white shadow-md rounded-2xl p-6">
                <h2 class="text-xl font-semibold text-[#fd593d] mb-3">Misi</h2>
                <ul class="ml-4 list-disc text-justify text-gray-800 space-y-2">
                    <li>Menyediakan kebutuhan pokok masyarakat dan sekitarnya dengan kualitas yang baik dan harga kompetitif</li>
                    <li>Memberikan pelayanan yang baik untuk menciptakan loyalitas dan kepuasan pelanggan</li>
                    <li>Mengembangkan sistem yang cepat, praktis, dan efektif</li>
                    <li>Melakukan penambahan atau inovasi produk dan sistem untuk keberlangsungan usaha dan memaksimalkan profit usaha</li>
                </ul>
            </div>
        </div>

    </div>

</x-app-layout>