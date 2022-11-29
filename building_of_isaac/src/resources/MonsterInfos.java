package resources;

import libraries.Vector2;

public class MonsterInfos
{
	public static Vector2 SPIDER_SIZE = RoomInfos.TILE_SIZE.scalarMultiplication(0.5);
	
	public static Vector2 FLY_SIZE = RoomInfos.TILE_SIZE.scalarMultiplication(0.4);
	
	public static Vector2 BOSS_SIZE = RoomInfos.TILE_SIZE.scalarMultiplication(0.9);
	
	public static Vector2 TEAR_SIZE = RoomInfos.TILE_SIZE.scalarMultiplication(0.3);
	
	public static final double SPIDER_SPEED = 0.02;
	public static final int SPIDER_POINT = 5;
	public static final int SPIDER_DAMAGE = 1;
	
	public static final int FLY_POINT = 3;
	public static final int FLY_DAMAGE = 1;
	
	public static final int BOSS_POINT = 10;
	public static final int BOSS_DAMAGE = 1;
	
	public static final double TEAR_SPEED = 0.05;
	public static final double FLY_SPEED = 0.01/8;
	public static final double FLY_TEAR_CARRY = 0.3;
	public static final double BOSS_TEAR_CARRY = 0.6;
	
	public static final String SPIDER = "Spider";
	public static final String FLY = "Fly";
	public static final String BOSS = "Boss";
	
}
