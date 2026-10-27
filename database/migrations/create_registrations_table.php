use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('participant_type'); // Mahasiswa, Guru, Umum
            $table->string('course_name');
            $table->string('learning_mode');    // Online, Offline, Hybrid
            $table->decimal('total_fee', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('registrations');
    }
};