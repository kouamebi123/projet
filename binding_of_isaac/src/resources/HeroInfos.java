package resources;

import libraries.Vector2;

public class HeroInfos
{
	public static Vector2 ISAAC_SIZE = RoomInfos.TILE_SIZE.scalarMultiplication(0.7);
	public static Vector2 TEAR_SIZE = RoomInfos.TILE_SIZE.scalarMultiplication(0.3);
	public static final double ISAAC_SPEED = 0.01;
	public static final int ISAAC_POINT = 6;
	public static final int NB_PIECE_MAX = 20;
	public static final int ISAAC_DAMAGE = 2;
	public static final double TEAR_SPEED = 0.05;
	public static final double TEAR_CARRY = 0.4;
	
}
