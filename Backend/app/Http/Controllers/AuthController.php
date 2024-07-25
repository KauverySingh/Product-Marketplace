namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    // Register a new user
    public function register(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        // Create a new user
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        // Generate JWT token for the user
        $token = JWTAuth::fromUser($user);

        // Return the user and token
        return response()->json(compact('user', 'token'), 201);
    }

    // Login a user and return a JWT token
    public function login(Request $request)
    {
        // Get login credentials
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate and generate token
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid Credentials'], 400);
        }

        // Return the token
        return response()->json(compact('token'));
    }

    // Refresh JWT token
    public function refresh()
    {
        return response()->json(['token' => JWTAuth::refresh()]);
    }

    // Logout the user
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Successfully logged out']);
    }

    // Get the authenticated user
    public function me()
    {
        return response()->json(auth()->user());
    }
}
