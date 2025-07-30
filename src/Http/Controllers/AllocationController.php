<?php

namespace ClientXCMS\Sso\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Pterodactyl\Models\Allocation;

class AllocationController
{
    /**
     * Update the alias IP for an allocation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $allocationId
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateAliasIp(Request $request, $allocationId)
    {
        $validator = Validator::make($request->all(), [
            'ip_alias' => 'present|nullable|string',
        ]);

        if ($validator->fails()) {
            return Response::json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $allocation = Allocation::findOrFail($allocationId);
        $allocation->ip_alias = $request->input('ip_alias') ?: null;
        $allocation->save();

        return Response::json(['success' => true, 'message' => 'IP alias updated successfully.']);
    }
}
