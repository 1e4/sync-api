<?php

namespace App\Http\Controllers;

use App\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllPublicRooms()
    {
        return response()->json(Room::all()->paginate(15));
    }

    /**
     * Create a new room
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createRoom()
    {
        $room = new Room();
        $room->name = str_random(20);
        $room->expires_at = (new Carbon())->addHour(6);
        $room->save();

        return response()->json($room);
    }

    /**
     * Display the specified resource.
     *
     * @param Room $room
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRoom(Room $room)
    {
        return response()->json($room);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Room $room
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function deleteRoom(Room $room)
    {
        $room->delete();

        return response()->json($room);
    }
}
