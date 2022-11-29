package gameobjects;
import java.time.Duration;
import java.time.Instant;
import java.util.ArrayList;
import java.util.List;

import gameWorld.GameWorld;
import gameobjects.Tear;
import libraries.StdDraw;
import libraries.Timer;
import libraries.Vector2;
import resources.DisplaySettings;
import resources.HeroInfos;
import resources.ImagePaths;
import resources.RoomInfos;

public class Personage {
	protected Vector2 position;
	protected Vector2 size;
	protected String imagePath;
	protected double speed;
	protected Vector2 direction;
	protected double carry;
	protected int damage;
	protected int point;
	protected long startime;
	public boolean okdeplacement;
	public boolean isOkdeplacement() {
		return okdeplacement;
	}


	public void setOkdeplacement(boolean okdeplacement) {
		this.okdeplacement = okdeplacement;
	}

	protected long startime1;
	protected long time;
	protected long time2;
	protected boolean contact = false;
	

	protected static final long limit =1999999999;
	public List <Tear> tearList;
	
	public Personage(Vector2 position, Vector2 size, double speed, String imagePath, double carry, int point, int damage)
	{
		this.position = position;
		this.carry = carry;
		this.point = point;
		this.damage = damage;
		this.okdeplacement = true;
		this.size = size;
		this.speed = speed;
		this.imagePath = imagePath;
		this.direction = new Vector2();
		this.tearList = new ArrayList<Tear>();
		this.startime = System.nanoTime();
		this.startime1 = (long) (1.7*1000000000);
	}
	
	
	public Personage(Vector2 position, Vector2 size, double speed, String imagePath, int point, int damage)
	{
		this.position = position;
		this.point = point;
		this.damage = damage;
		this.size = size;
		this.okdeplacement = true;
		this.speed = speed;
		this.imagePath = imagePath;
		this.direction = new Vector2();
		this.tearList = new ArrayList<Tear>();
		this.startime = System.nanoTime();
	}
	
	
	/*
	 * Moving from key inputs. Direction vector is later normalised.
	 */	
	public void updateGameObject()
	{
		move();
	}

	protected void move()
	{
		Vector2 normalizedDirection = getNormalizedDirection();
		Vector2 positionAfterMoving = getPosition().addVector(normalizedDirection);
		setPosition(positionAfterMoving);
		this.direction = new Vector2();
		
	}

	public void drawGameObject()
	{
		StdDraw.picture(getPosition().getX(), getPosition().getY(), getImagePath(), getSize().getX(), getSize().getY(),
				0);
	}
	
	/*
	 * Getters and Setters
	 */
	
	public Vector2 getPosition()
	{
		return position;
	}

	public void setPosition(Vector2 position)
	{
		this.position = position;
	}

	public Vector2 getSize()
	{
		return size;
	}

	public void setSize(Vector2 size)
	{
		this.size = size;
	}

	public String getImagePath()
	{
		return imagePath;
	}

	public void setImagePath(String imagePath)
	{
		this.imagePath = imagePath;
	}

	public double getSpeed()
	{
		return speed;
	}

	public void setSpeed(double speed)
	{
		this.speed = speed;
	}

	public Vector2 getDirection()
	{
		return direction;
	}

	public void setDirection(Vector2 direction)
	{
		this.direction = direction;
	}

	public double getCarry() {
		return carry;
	}

	public void setCarry(double carry) {
		this.carry = carry;
	}

	public int getDamage() {
		return damage;
	}

	public void setDamage(int damage) {
		this.damage = damage;
	}

	public int getPoint() {
		return point;
	}

	public void setPoint(int point) {
		this.point = point;
	}
	
	public boolean isContact() {
		return contact;
	}
	public void setContact(boolean contact) {
		this.contact = contact;
	}
	
	public Vector2 getNormalizedDirection()
	{
		Vector2 normalizedVector = new Vector2(direction);
		normalizedVector.euclidianNormalize(speed);
		return normalizedVector;
	}
	
	public void goUpNext()
	{
		if(getPosition().getY()<0.89 && this.okdeplacement) {
			getDirection().addY(1);
			this.okdeplacement = true;
		}
		
		
	}

	public void goDownNext()
	{
		if(getPosition().getY()>0.11 && this.okdeplacement) {
			getDirection().addY(-1);
			this.okdeplacement = true;
		}
		
	}

	public void goLeftNext()
	{
		if(getPosition().getX()>0.07 && this.okdeplacement) {
			getDirection().addX(-1);
			this.okdeplacement = true;
		}
		
	}

	public void goRightNext()
	{
		if(getPosition().getX()<0.93 && this.okdeplacement) {
			getDirection().addX(1);
			this.okdeplacement = true;
		}
	}

}
