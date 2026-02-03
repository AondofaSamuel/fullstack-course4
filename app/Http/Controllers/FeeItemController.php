<?php

namespace App\Http\Controllers;

use App\Models\FeeItem;
use Illuminate\Http\Request;

class FeeItemController extends Controller
{
    public function index()
    {
        return FeeItem::with(['term.session', 'classLevel'])->paginate(25);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'term_id' => ['required', 'exists:terms,id'],
            'class_level_id' => ['required', 'exists:class_levels,id'],
            'name' => ['required', 'string', 'max:255'],
            'amount_kobo' => ['required', 'integer', 'min:0'],
            'is_mandatory' => ['nullable', 'boolean'],
        ]);

        return FeeItem::create($data);
    }

    public function show(FeeItem $feeItem)
    {
        return $feeItem->load(['term.session', 'classLevel']);
    }

    public function update(Request $request, FeeItem $feeItem)
    {
        $data = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'amount_kobo' => ['sometimes', 'integer', 'min:0'],
            'is_mandatory' => ['nullable', 'boolean'],
        ]);

        $feeItem->update($data);

        return $feeItem->refresh();
    }

    public function destroy(FeeItem $feeItem)
    {
        $feeItem->delete();

        return response()->noContent();
    }
}
