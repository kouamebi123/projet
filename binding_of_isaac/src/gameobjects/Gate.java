package gameobjects;

import libraries.StdDraw;
import libraries.Vector2;

public class Gate {

	protected Vector2 position;
	protected Vector2 size;
	protected String imagePath;
	protected int angle; 
	
	public Gate(Vector2 position,Vector2 size,String imagePath,int angle) {
		this.position = position;
		this.size = size;
		this.imagePath = imagePath;
		this.angle = angle;
	}
	
	
	public void drawGameObject()
	{
		StdDraw.picture(getPosition().getX(), getPosition().getY(), getImagePath(), getSize().getX(), getSize().getY(),
				getAngle());
	}
	
	/*
	 * Getters et Setters
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
	public int getAngle() {
		return angle;
	}

	public void setAngle(int angle) {
		this.angle = angle;
	}


}
