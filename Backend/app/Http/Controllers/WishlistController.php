namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    // Display the user's wishlist
    public function index()
    {
        $wishlist = auth()->user()->wishlist()->with('product')->get();
        return response()->json($wishlist);
    }

    // Add a product to the wishlist
    public function store(Request $request)
    {
        $wishlist = auth()->user()->wishlist()->create([
            'product_id' => $request->product_id,
        ]);

        return response()->json($wishlist, 201);
    }

    // Remove a product from the wishlist
    public function destroy($id)
    {
        $wishlist = Wishlist::find($id);
        if (!$wishlist || $wishlist->user_id !== auth()->id()) {
            return response()->json(['message' => 'Wishlist item not found'], 404);
        }

        $wishlist->delete();
        return response()->json(['message' => 'Wishlist item removed']);
    }
}
