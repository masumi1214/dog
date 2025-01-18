<x-app-layout>
    <h1>データ登録フォーム</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('materials.store') }}" method="POST">
        @csrf

 <div class="js-material-group">
    <div class="js-material-item">
        <label for="name">食材名:</label>
        <input type="text" name="name[]" id="name" required>
        @error('name')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>

        <label for="unit">単位:</label>
        <input type="text" name="unit[]" id="unit" required>
        @error('unit')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>
        <button class="js-button-add-item" type="button">追加</button>
       </div>
    </div>

        <!-- <label for="nutrient_1">栄養素1:</label>
        <input type="number" step="0.01" name="nutrient_1" id="nutrient_1">
        @error('nutrient_1')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>

        <label for="nutrient_2">栄養素2:</label>
        <input type="number" step="0.01" name="nutrient_2" id="nutrient_2">
        @error('nutrient_2')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br> -->

        <button type="submit">登録</button>
        
    </form>
    @push('scripts')
    <script>
        //console.log('test');
        $(document).ready(function () {
  // ボタンのクリックイベントを設定
  $(".js-button-add-item").on("click", function () {
    // ボタンが含まれるjs-material-itemを取得
    const currentItem = $(this).closest(".js-material-item");

    // 現在のjs-material-itemを複製
    const newItem = currentItem.clone();

    // 複製した要素の中のボタンの状態をリセット（必要に応じて変更）
    newItem.find("input, textarea").val(""); // 入力フィールドをリセット
    newItem.find(".js-button-add-item").text("項目を追加"); // ボタンのテキスト変更例

    // js-material-group内に新しい項目を挿入
    $(".js-material-group").append(newItem);
  });
});
    </script>
@endpush
</x-app-layout>

