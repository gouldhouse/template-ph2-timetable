<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '時間割' }} | POSSE大学</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-800">
    <header class="bg-[#1f3a5f] text-white">
        <div class="mx-auto max-w-5xl px-4 py-4">
            <p class="text-xs tracking-widest text-blue-100">POSSE大学 学務ポータル</p>
            <h1 class="mt-1 text-xl font-bold">{{ $title ?? '時間割' }}</h1>
        </div>
    </header>

    <main class="mx-auto max-w-5xl px-4 py-6">
        <section class="overflow-hidden rounded-lg border border-slate-200 bg-white">
            <div class="border-b border-slate-200 px-5 py-4">
                <h2 class="text-base font-bold text-slate-800">授業一覧</h2>
                <p class="mt-1 text-xs text-slate-500">登録されている授業を表示しています。</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-700">
                    <thead class="bg-slate-50 text-slate-600">
                        <tr>
                            <th scope="col" class="whitespace-nowrap px-4 py-2 font-medium">科目コード</th>
                            <th scope="col" class="whitespace-nowrap px-4 py-2 font-medium">授業名</th>
                            <th scope="col" class="whitespace-nowrap px-4 py-2 font-medium">担当教員</th>
                            <th scope="col" class="whitespace-nowrap px-4 py-2 font-medium">曜日</th>
                            <th scope="col" class="whitespace-nowrap px-4 py-2 font-medium">時限</th>
                            <th scope="col" class="whitespace-nowrap px-4 py-2 font-medium">教室</th>
                            <th scope="col" class="whitespace-nowrap px-4 py-2 font-medium">単位数</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr class="border-t border-slate-200">
                                <td class="whitespace-nowrap px-4 py-2">{{ $course->code }}</td>
                                <td class="whitespace-nowrap px-4 py-2">{{ $course->name }}</td>
                                <td class="whitespace-nowrap px-4 py-2">{{ $course->teacher }}</td>
                                <td class="whitespace-nowrap px-4 py-2">{{ $dayNames[$course->day] ?? $course->day }}</td>
                                <td class="whitespace-nowrap px-4 py-2">{{ $course->period }}</td>
                                <td class="whitespace-nowrap px-4 py-2">{{ $course->room }}</td>
                                <td class="whitespace-nowrap px-4 py-2">{{ $course->credits }}</td>
                            </tr>
                        @endforeach
                        @if (count($courses) === 0)
                            <tr class="border-t border-slate-200">
                                <td colspan="7" class="px-4 py-6 text-center text-slate-500">授業データがありません。</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <footer class="mx-auto max-w-5xl px-4 pb-8 text-xs text-slate-500">
        POSSE大学 学務課
    </footer>
</body>
</html>