Schema::create('exports', function (Blueprint $table) {
    $table->id();

    $table->foreignId('report_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->enum('format', ['PDF', 'CSV']);

    $table->timestamp('exported_at');

    $table->timestamps();
});