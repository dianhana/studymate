<x-app-layout>
@section('title', 'Messages')
<div class="max-w-7xl mx-auto h-[calc(100vh-170px)] bg-white rounded-xl shadow overflow-hidden">

    <div class="grid grid-cols-12 h-full overflow-hidden">

        {{-- ========================= --}}
        {{-- SIDEBAR PARTNER --}}
        {{-- ========================= --}}

        <div class="col-span-4 border-r flex flex-col">

            <div class="p-5 border-b">
                <h2 class="font-bold text-2xl">
                    Messages
                </h2>

                <p class="text-gray-500 text-sm mt-1">
                    Pilih partner untuk memulai percakapan.
                </p>
            </div>

            @forelse($friends as $friend)

                <a
                    href="{{ route('messages',['user'=>$friend->friend->id]) }}"
                    class="flex items-center justify-between p-4 hover:bg-gray-100 transition
                    {{ request('user') == $friend->friend->id ? 'bg-blue-50 border-r-4 border-blue-600' : '' }}">

                    <div class="flex items-center gap-3">

                        <img
                            src="https://ui-avatars.com/api/?name={{ urlencode($friend->friend->name) }}&background=3b82f6&color=fff"
                            class="w-12 h-12 rounded-full">

                        <div>

                            <div class="flex justify-between items-center">

                            <h3 class="font-semibold">

                                {{ $friend->friend->name }}

                            </h3>

                            @if($friend->lastMessage)

                                <span class="text-xs text-gray-400">

                                    {{ $friend->lastMessage->created_at->format('H:i') }}

                                </span>

                            @endif

                        </div>

                            <p class="text-sm text-gray-500">
                                {{ $friend->friend->user_code }}
                            </p>

                            @if($friend->lastMessage)
                                <p class="text-xs text-gray-400 truncate w-40">
                                    @if($friend->lastMessage)

                                    <p class="text-gray-500 text-sm truncate w-44">

                                    @if($friend->lastMessage->sender_id==auth()->id())

                                    <b>Anda:</b>

                                    @endif

                                    {{ $friend->lastMessage->message }}

                                    </p>

                                    @endif
                                </p>
                            @endif

                        </div>

                    </div>

                    @if($friend->unread > 0)

                        <span
                            class="bg-red-500 text-white text-xs font-bold w-6 h-6 rounded-full flex items-center justify-center">

                            {{ $friend->unread }}

                        </span>

                    @endif

                </a>

            @empty

                <div class="p-10 text-center text-gray-500">
                    Belum mempunyai partner.
                </div>

            @endforelse

        </div>

        {{-- ========================= --}}
        {{-- CHAT --}}
        {{-- ========================= --}}

        <div class="col-span-8 flex flex-col h-full overflow-hidden">

            @if($selectedUser)

            {{-- HEADER CHAT --}}

            <div class="border-b p-5 flex items-center gap-4">

                <img
                    src="https://ui-avatars.com/api/?name={{ urlencode($selectedUser->name) }}&background=10b981&color=fff"
                    class="w-12 h-12 rounded-full">

                <div>

                    <h2 class="font-bold text-lg">
                        {{ $selectedUser->name }}
                    </h2>

                    <p class="text-gray-500 text-sm">
                        {{ $selectedUser->user_code }}
                    </p>

                </div>

            </div>

            {{-- CHAT BODY --}}

           

                <div
                    id="chat-box"
                    class="flex-1 overflow-y-auto p-6 bg-gray-50">

                                    @forelse($messages as $message)

                    @if($message->sender_id == auth()->id())

                        <div class="flex justify-end mb-4">

                            <div class="bg-blue-600 text-white rounded-xl px-4 py-3 max-w-sm">

                                {{ $message->message }}

                                <div class="text-xs mt-2 text-blue-100 text-right">

                                    {{ $message->created_at->format('H:i') }}

                                </div>

                            </div>

                        </div>

                    @else

                        <div class="flex justify-start mb-4">

                            <div class="bg-white rounded-xl px-4 py-3 shadow max-w-sm">

                                {{ $message->message }}

                                <div class="text-xs mt-2 text-gray-400 text-right">

                                    {{ $message->created_at->format('H:i') }}

                                </div>

                            </div>

                        </div>

                    @endif

                @empty

                    <div class="flex justify-center items-center h-full text-gray-400">

                        Belum ada percakapan.

                    </div>

                @endforelse

            </div>

            {{-- INPUT CHAT --}}
            <form
                action="{{ route('messages.send') }}"
                method="POST"
                class="border-t p-5 flex gap-3 ">

                @csrf

                <input
                    type="hidden"
                    name="receiver_id"
                    value="{{ $selectedUser->id }}">

                <input
                    type="text"
                    name="message"
                    placeholder="Tulis pesan..."
                    class="flex-1 border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 rounded-lg">

                    Kirim

                </button>

            </form>

            @else

            <div class="flex flex-col justify-center items-center h-full">

                <div class="text-6xl mb-5">
                    💬
                </div>

                <h2 class="text-2xl font-bold">
                    Selamat Datang di Chat
                </h2>

                <p class="text-gray-500 mt-3">
                    Pilih partner di sebelah kiri untuk mulai mengobrol.
                </p>

            </div>

            @endif

        </div>

    </div>

</div>

@if($selectedUser)

<script>

window.onload = function () {

    let chatBox = document.getElementById('chat-box');

    if(chatBox){
        chatBox.scrollTop = chatBox.scrollHeight;
    }

}

</script>

@endif

</x-app-layout>