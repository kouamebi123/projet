package resources;

import libraries.Vector2;

public class RoomInfos
{
	public static final int NB_TILES = 9;
	public static final double TILE_WIDTH = 1.0 / NB_TILES;
	public static final double TILE_HEIGHT = 1.0 / NB_TILES;
	public static final Vector2 TILE_SIZE = new Vector2(TILE_WIDTH, TILE_HEIGHT);
	public static final Vector2 HALF_TILE_SIZE = new Vector2(TILE_WIDTH, TILE_HEIGHT).scalarMultiplication(0.5);
	public static final Vector2 PIECE = new Vector2(TILE_WIDTH, TILE_HEIGHT).scalarMultiplication(0.35);
	public static final Vector2 ROOM_SIZE = RoomInfos.TILE_SIZE.scalarMultiplication(9);
	public static final Vector2 WIN_SIZE = RoomInfos.TILE_SIZE.scalarMultiplication(9);
	public static final Vector2 DOOR_SIZE = RoomInfos.TILE_SIZE.scalarMultiplication(1.05);
	public static final Vector2 POSITION_CENTER_OF_ROOM = new Vector2(0.5, 0.5);
	public static final Vector2 UP_DOOR = new Vector2(0.5, 0.95);
	public static final Vector2 DOWN_DOOR = new Vector2(0.5, 0.05);
	public static final Vector2 LEFT_DOOR = new Vector2(0.05, 0.5);
	public static final Vector2 RIGHT_DOOR = new Vector2(0.95, 0.5);
	public static Vector2 OBSTACLE = RoomInfos.TILE_SIZE.scalarMultiplication(0.7);
	
	
}
