namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|digits:10',
            'address' => 'nullable|string',
            'profile_image' => 'required|image|mimes:jpg,png,gif|max:2048',
        ]);

        $imagePath = $request->file('profile_image')->store('profile_images', 'public');

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'profile_image' => $imagePath,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|alpha',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'mobile' => 'required|digits:10',
            'address' => 'nullable|string',
            'profile_image' => 'image|mimes:jpg,png,gif|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $imagePath;
        }

        $user->update($request->only('name', 'email', 'mobile', 'address'));

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
}
