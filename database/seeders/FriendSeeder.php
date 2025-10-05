<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Friend;
use App\Models\User;

class FriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        if ($users->count() < 2) {
            return;
        }

        // Create up to N random unique pairs
        $targetPairs = min(20, (int) floor($users->count() / 2));
        $attempts = 0;
        $created = 0;
        while ($created < $targetPairs && $attempts < $targetPairs * 10) {
            $attempts++;
            $randomTwo = $users->random(min(2, $users->count()));
            if ($randomTwo->count() < 2) {
                continue;
            }
            [$a, $b] = $randomTwo->values()->all();
            if (!$a || !$b || $a->id === $b->id) {
                continue;
            }

            // Avoid duplicates (both directions)
            $exists = Friend::where(function ($q) use ($a, $b) {
                $q->where('user_id', $a->id)->where('friend_id', $b->id);
            })->orWhere(function ($q) use ($a, $b) {
                $q->where('user_id', $b->id)->where('friend_id', $a->id);
            })->exists();
            if ($exists) {
                continue;
            }

            Friend::factory()->state([
                'user_id' => $a->id,
                'friend_id' => $b->id,
            ])->create();
            $created++;
        }
    }
}


