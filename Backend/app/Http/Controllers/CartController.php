namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Display the user's cart
    public function index()
    {
        $cart = auth()->user()->cart()->with('product')->get();
        return response()->json($cart);
    }

    // Add a product to the cart
    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $cart = auth()->user()->cart()->create([
            'product_id' => $product->id,
            'quantity' => $request->quantity,
        ]);

        return response()->json($cart, 201);
    }

    // Update the quantity of a product in the cart
    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        if (!$cart || $cart->user_id !== auth()->id()) {
            return response()->json(['message' => 'Cart item not found'], 404);
        }

        $cart->update(['quantity' => $request->quantity]);
        return response()->json($cart);
    }

    // Remove a product from the cart
    public function destroy($id)
    {
        $cart = Cart::find($id);
        if (!$cart || $cart->user_id !== auth()->id()) {
            return response()->json(['message' => 'Cart item not found'], 404);
        }

        $cart->delete();
        return response()->json(['message' => 'Cart item removed']);
    }
}
