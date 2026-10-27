namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index() {
        return view('home');
    }

    public function createRegistration() {
        return view('registrations.create');
    }

    public function storeRegistration(Request $request) {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'participant_type' => 'required|string',
            'course_name' => 'required|string',
            'learning_mode' => 'required|string',
        ]);

        // Kalkulasi Biaya Sederhana Berdasarkan Tipe Peserta
        $baseFee = 500000;
        $discount = match($validated['participant_type']) {
            'Mahasiswa' => 0.20,
            'Guru' => 0.15,
            default => 0.05,
        };

        $validated['total_fee'] = $baseFee - ($baseFee * $discount);

        Registration::create($validated);

        return redirect()->route('registrations.history')->with('success', 'Pendaftaran KursusKu berhasil disimpan!');
    }

    public function history() {
        $registrations = Registration::latest()->get();
        return view('registrations.history', compact('registrations'));
    }
}