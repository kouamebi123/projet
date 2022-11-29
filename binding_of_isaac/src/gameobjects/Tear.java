package gameobjects;

import libraries.StdDraw;
import libraries.Vector2;

public class Tear {
	private Vector2 position;
	private Vector2 size;
	private String imagePath;
	private double speed;
	private double TirVertical;
	private double TirHorizontal;
	private Vector2 direction;
	public final Vector2 InitialPosition;


	public Tear(Vector2 position, Vector2 size, double speed, String imagePath,double TirVertical,double TirHorizontal )
	{
		this.InitialPosition = position;
		this.position = position;
		this.size = size;
		this.speed = speed;
		this.imagePath = imagePath;
		this.direction = new Vector2();
		this.TirVertical = TirVertical;
		this.TirHorizontal = TirHorizontal;
	}

	public void updateGameObject()
	{
		move();
	}

	private void move()
	{
		Vector2 normalizedDirection = getNormalizedDirection();
		Vector2 positionAfterMoving = getPosition().addVector(normalizedDirection);
			setPosition(new Vector2(positionAfterMoving.getX()+TirHorizontal*speed, positionAfterMoving.getY()+TirVertical*speed));
			direction = new Vector2();
		
	}

	public void drawGameObject()
	{
		StdDraw.picture(getPosition().getX(), getPosition().getY(), getImagePath(), getSize().getX(), getSize().getY(),
				0);
	}

	/*
	 * Moving from key inputs. Direction vector is later normalised.
	 */
	/*public void tirUp()
	{
		this.TirVertical = 0.005;
		this.TirHorizontal = 0.0;
	}

	public void goDownNext()
	{
		this.TirVertical = -0.005;
		this.TirHorizontal = 0.0;
	}

	public void goLeftNext()
	{
		this.TirVertical = 0.0;
		this.TirHorizontal = -0.005;
	}

	public void goRightNext()
	{
		this.TirVertical = 0.0;
		this.TirHorizontal = 0.005;
	}*/

	public Vector2 getNormalizedDirection()
	{
		Vector2 normalizedVector = new Vector2(direction);
		//normalizedVector.euclidianNormalize(speed);
		return normalizedVector;
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

}